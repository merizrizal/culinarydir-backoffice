<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = 'Maintenance'; ?>

<div class="col-md-12">
    <div class="col-middle">
        <div class="text-center error-page">
            <h1 class="error-number"><?= Html::encode($this->title) ?></h1>
            <h2><?= nl2br(Yii::t('app', 'Website Currently Under Maintenance')) ?></h2>
        </div>
    </div>
</div>
<!-- /page content -->