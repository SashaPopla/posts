<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animate.css',
        'css/flexslider.css',
        'css/bootstrap.css',
        'css/icomoon.css',
        'css/style.css',
        'css/site.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/jquery.easing.1.3.js',
        'js/jquery.min.js',
        'js/jquery.stellar.min.js',
        'js/jquery.waypoints.min.js',
        'js/modernizr-2.6.2.min.js',
        'js/respond.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
