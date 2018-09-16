<?php

namespace app\modules\admin\controllers;

use app\modules\admin\forms\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{





    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


}
