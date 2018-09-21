<?php

namespace app\modules\admin;

use app\modules\admin\entities\User;
use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = 'main';

    public $defaultRoute = 'default/index';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     *
     */
    public function init()
    {
        parent::init();
    }
}
