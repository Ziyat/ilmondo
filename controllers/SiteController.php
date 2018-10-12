<?php

namespace app\controllers;

use app\models\ContactForm;
use app\modules\admin\readModels\CategoryReadModel;
use app\modules\admin\readModels\ProductReadModel;
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
 */
class SiteController extends Controller
{
    public $categories;
    public $products;

    public function __construct(
        string $id,
        $module,
        CategoryReadModel $categoryReadModel,
        ProductReadModel $productReadModel,
        array $config = []
    )
    {
        $this->products = $productReadModel;
        $this->categories = $categoryReadModel;
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
                'minLength' => 4,
                'maxLength' => 4,
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
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['feedbackMail'])) {
                Yii::$app->session->setFlash('success', 'Сообщение успешно отправлено!');
            } else {
                Yii::$app->session->setFlash('error', 'Сообщение не отправлено, повторите попытку позже!');
            }
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
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
