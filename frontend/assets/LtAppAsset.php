<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class LtAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/respond.min.js',
    ];

    public $jsOptions = [
        'condition' => 'lte IE9',
        'position' => \yii\web\View::POS_END,
    ];
}