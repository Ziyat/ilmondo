<?php

namespace app\controllers;

use app\forms\LoyaltyCardForm;
use app\forms\ProductSearch;
use app\models\ContactForm;
use madetec\crm\entities\Client;
use madetec\crm\forms\ClientForm;
use madetec\crm\readModels\CategoryReadModel;
use madetec\crm\readModels\DiscountReadModel;
use madetec\crm\readModels\ProductReadModel;
use madetec\crm\services\ClientManageService;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * Class SiteController
 * @package app\controllers
 * @property CategoryReadModel $categories
 * @property ProductReadModel $products
 * @property DiscountReadModel $discounts
 * @property ClientManageService $clientManageService
 */
class SiteController extends Controller
{
    public $categories;
    public $products;
    public $discounts;
    public $clientManageService;

    public function __construct(
        string $id,
        $module,
        CategoryReadModel $categoryReadModel,
        ProductReadModel $productReadModel,
        DiscountReadModel $discountReadModel,
        ClientManageService $clientManageService,
        array $config = []
    )
    {
        $this->products = $productReadModel;
        $this->categories = $categoryReadModel;
        $this->clientManageService = $clientManageService;
        $this->discounts = $discountReadModel;
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'minLength' => 6,
                'maxLength' => 6,
            ],
        ];
    }

    /**
     * @param $slug
     * @return string
     * @throws \yii\base\InvalidArgumentException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDiscount($slug)
    {
        return $this->render('discount',[
            'discount' => $this->discounts->findBySlug($slug)
        ]);
    }

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex()
    {
        return $this->render('index',[
            'products' => $this->products->findAllActive()
        ]);
    }


    /**
     * @return string|Response
     * @throws \DomainException
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionContact()
    {
        $model = new ContactForm();
        $form = new LoyaltyCardForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['feedbackMail'])) {
                Yii::$app->session->setFlash('success', 'Сообщение успешно отправлено!');
            } else {
                Yii::$app->session->setFlash('error', 'Сообщение не отправлено, повторите попытку позже!');
            }
            return $this->refresh();
        }

        if($form->load(Yii::$app->request->post()) && $form->validate()){

            $clientForm = new ClientForm();

            $clientForm->name = $form->name;

            $clientForm->phone = $form->phone;

            $clientForm->email = $form->email;

            $clientForm->address_line_1 = $form->city;

            $clientForm->date_of_birth = $form->dob;

            $clientForm->status = Client::STATUS_CLIENT;

            $clientForm->params = 'Регистрация карты, дата: '. date('d-m-Y H:i:s') . ', номер карты: '.$form->cardNumber;

            $client = $this->clientManageService->create($clientForm);

            Yii::$app->session->setFlash('success', $client->name . ', регистрация Вашей карты успешно завершено!');

        }

        return $this->render('contact', [
            'model' => $model,
            'cardForm' => $form
        ]);
    }

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionProduct()
    {
        return $this->render('product');
    }

    public function actionAssortment()
    {
        return $this->render('assortment');
    }

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionService()
    {
        $data = [
            (object)[
                'image' => '/images/services/services_9.jpg',
                'text' => 'Компания IL MONDO ORAFO рада представить 
                Вам уникальную возможность по созданию индивидуального украшения любой сложности.'
            ],
            (object)[
                'image' => '/images/services/services_8.jpg',
                'text' => 'Наши Мастера искусно готовы воплотить в жизнь любую вашу мечту и идею.
                            Опытные Дизайнеры и Геммологи проконсультируют и сопроводят в выборе метала и камней.'
            ],
            (object)[
                'image' => '/images/services/services_7.jpg',
                'text' => 'По образцу художественных изделий из Нашего каталога. - Доработка изделия под видение заказчика.'
            ],
            (object)[
                'image' => '/images/services/services_12.jpg',
                'text' => 'По образцу заказчика: Изделие, эскиз или фото.'
            ],
            (object)[
                'image' => '/images/services/services_2.jpg',
                'text' => '3D Моделирование. Обрисовка идеи. Разработка эксклюзивного дизайн макета будущего изделия.'
            ],
            (object)[
                'image' => '/images/services/services_1.jpg',
                'text' => 'Так же Вы можете воспользоваться услугами Геммолога в оценке, 
                консультации и сопровождение сделок с драгоценными камнями и металлами.'
            ],
        ];
        return $this->render('service', [
            'data' => $data
        ]);
    }

    public function actionWarranty()
    {
        return $this->render('warranty');
    }

    public function actionPartners()
    {
        return $this->render('partners');
    }

    public function actionPhilosophy()
    {
        return $this->render('philosophy');
    }

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionSearch()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
