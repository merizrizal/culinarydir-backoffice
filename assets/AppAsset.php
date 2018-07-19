<?php

namespace backoffice\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/media';
    public $baseUrl = '@web/media';

    public $css = [
        'css/custom.css',
        'css/site.css',
    ];
    public $js = [
        'js/custom.js',
    ];
    public $depends = [
        'common\assets\AppAsset',
    ];
}