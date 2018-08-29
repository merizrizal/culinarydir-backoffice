<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;

$strH1 = '';

switch ($exception->statusCode) {
    case 400:
        $strH1 = 'Parameter data tidak lengkap.';
        break;
    case 403:
        $strH1 = 'Maaf Anda tidak berkewenangan untuk mengakses data ini.';
        break;
    case 404:
        $strH1 = 'Data yang Anda cari tidak ada.';
        break;
    case 405:
        $strH1 = 'Terdapat kesalahan dalam proses penginputan data.';
        break;
    case 406:
        $strH1 = $exception->getMessage();
        break;
}
?>

<div class="col-md-12">
    <div class="col-middle">
        <div class="text-center error-page">
            <h1 class="error-number"><?= $name ?></h1>
            <h2><?= $strH1 ?></h2>
            <p><?= Html::a('Back.', Yii::$app->request->referrer); ?></p>
        </div>
    </div>
</div>
<!-- /page content -->