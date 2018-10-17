<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\controllers;

use app\forms\PreOrderForm;
use madetec\crm\entities\Client;
use madetec\crm\entities\Order;
use madetec\crm\forms\ClientForm;
use madetec\crm\forms\OrderForm;
use madetec\crm\readModels\CategoryReadModel;
use madetec\crm\readModels\ProductReadModel;
use madetec\crm\services\CategoryManageService;
use madetec\crm\services\ClientManageService;
use madetec\crm\services\OrderManageService;
use madetec\crm\services\ProductManageService;
use yii\helpers\VarDumper;

/**
 * @property ProductReadModel $products
 * @property CategoryReadModel $categories
 * @property ProductManageService $manageService
 * @property CategoryManageService $categoryManageService
 *
 * @property ClientManageService $clientManageService
 * @property OrderManageService $orderManageService
 */
class ProductsController extends \yii\web\Controller
{
    public $products;
    public $categories;
    public $manageService;
    public $categoryManageService;

    public $clientManageService;
    public $orderManageService;

    public function __construct(
        string $id,
        $module,
        ProductReadModel $productReadModel,
        CategoryReadModel $categoryReadModel,
        ProductManageService $manageService,
        CategoryManageService $categoryManageService,
        ClientManageService $clientManageService,
        OrderManageService $orderManageService,
        array $config = []
    )
    {
        $this->categoryManageService = $categoryManageService;
        $this->manageService = $manageService;
        $this->products = $productReadModel;
        $this->categories = $categoryReadModel;

        $this->clientManageService = $clientManageService;
        $this->orderManageService = $orderManageService;

        parent::__construct($id, $module, $config);
    }

    /**
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'products' => $this->products->findAllActive()
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws \DomainException
     * @throws \yii\base\InvalidArgumentException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        $this->manageService->addView($id);
        $product = $this->products->find($id);
        $form = new PreOrderForm();
        if ($form->load(\Yii::$app->request->post()) && $form->validate()) {

            try {
                $client = $this->createClient(
                    $form->name,
                    $form->phone,
                    $form->email,
                    $form->address
                );
                $order = $this->createOrder($client->id, $product->id, $form->quantity);
                \Yii::$app->session->setFlash('success', 'Спасибо, Ваш заказ принят. Менеджер скоро свяжется с Вами! Ваш № заказа: ' . $order->id);
            } catch (\Exception $e) {
                \Yii::$app->session->setFlash('error', $e->getMessage() . ' Заказ не принят, повторите попытку позже!');
            }


        }
        return $this->render('view', [
            'product' => $product,
            'model' => $form,
        ]);
    }

    /**
     * @param $slug
     * @return string
     * @throws \DomainException
     * @throws \yii\base\InvalidArgumentException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionCategory($slug)
    {
        $category = $this->categories->findBySlug($slug);
        $this->categoryManageService->addView($category->id);
        $products = $this->products->findByCategoryId($category);
        return $this->render('category', [
            'category' => $category,
            'products' => $products,
        ]);
    }


    /**
     * @param $name
     * @param $phone
     * @param $email
     * @param $address
     * @return array|Client|null|\yii\db\ActiveRecord
     * @throws \DomainException
     */
    protected function createClient($name, $phone, $email, $address)
    {
        if (!$client = Client::find()->where(['=', 'phone', $phone])->one()) {
            $clientForm = new ClientForm();
            $clientForm->name = $name;
            $clientForm->phone = $phone;
            $clientForm->email = $email;
            $clientForm->address_line_1 = $address;
            return $this->clientManageService->create($clientForm);
        }
        return $client;
    }

    /**
     * @param $client_id
     * @param $product_id
     * @param $quantity
     * @return Order
     * @throws \DomainException
     * @throws \LogicException
     * @throws \yii\web\NotFoundHttpException
     */
    protected function createOrder($client_id, $product_id, $quantity)
    {
        $order = new OrderForm();
        $order->client = $client_id;
        $order->status = Order::STATUS_NEW;

        $order->products[0]->product = $product_id;
        $order->products[0]->quantity = $quantity ?? 1;
        return $this->orderManageService->create($order);
    }

}