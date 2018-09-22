<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

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
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @return string|Response
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

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
