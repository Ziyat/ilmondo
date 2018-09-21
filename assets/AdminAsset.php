<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $js = [
        'plugins/input-mask/jquery.inputmask.js',
        'plugins/input-mask/jquery.inputmask.phone.extensions.js',
        'plugins/input-mask/jquery.inputmask.date.extensions.js',
    ];
    public $css = [
        'bower_components/font-awesome/css/font-awesome.min.css',
    ];
    public $depends = [
        'rmrevin\yii\fontawesome\AssetBundle',
    ];
}
