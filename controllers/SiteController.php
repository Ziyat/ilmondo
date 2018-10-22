<?php

namespace app\controllers;

use app\forms\LoyaltyCardForm;
use app\models\ContactForm;
use madetec\crm\entities\Client;
use madetec\crm\forms\ClientForm;
use madetec\crm\readModels\CategoryReadModel;
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
 * @property ClientManageService $clientManageService
 */
class SiteController extends Controller
{
    public $categories;
    public $products;
    public $clientManageService;

    public function __construct(
        string $id,
        $module,
        CategoryReadModel $categoryReadModel,
        ProductReadModel $productReadModel,
        ClientManageService $clientManageService,
        array $config = []
    )
    {
        $this->products = $productReadModel;
        $this->categories = $categoryReadModel;
        $this->clientManageService = $clientManageService;
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

    public function actionService()
    {
        return $this->render('service');
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

}
