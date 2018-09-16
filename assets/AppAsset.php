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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/base.css',
        'css/fonts.css',
        'css/main.css',
        'css/vendor.css',
    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
        'jquery.zoom.min.js',
        'js/plugins.js',
        'js/main.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}

class HeadAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        "js/modernizr.js",
        "js/pace.min.js",
    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}
