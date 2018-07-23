<?php
unset($this->assetBundles['common\assets\AppAsset']);
unset($this->assetBundles['yii\web\YiiAsset']);
unset($this->assetBundles['yii\web\JqueryAsset']);
unset($this->assetBundles['yii\bootstrap\BootstrapAsset']);
unset($this->assetBundles['yii\bootstrap\BootstrapPluginAsset']);

$this->beginPage();
$this->head();
$this->beginBody();

echo $content;

$jscript = '
    $("meta[name=\'csrf-param\']").attr("content", "' . Yii::$app->request->csrfParam . '");
    $("meta[name=\'csrf-token\']").attr("content", "' . Yii::$app->request->csrfToken . '");

    $("button[type=submit]").after("&nbsp;");
';

$this->registerJs($jscript);

$this->endBody();
$this->endPage(true); ?>