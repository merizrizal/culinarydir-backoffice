<?php
use yii\helpers\Html;
use backoffice\assets\AppAsset;
use backoffice\components\AppComponent;

AppAsset::register($this); ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="app" content="<?= Html::encode(Yii::$app->name) ?>">
        <?= Html::csrfMetaTags() ?>

        <!-- Favicon -->
        <link rel="icon" href="<?= Yii::$app->request->baseUrl . '/media/favicon.png' ?>" type="image/x-icon">
        <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl . '/media/favicon.png' ?>" type="image/x-icon">
        <link rel="apple-touch-icon" href="<?= Yii::$app->request->baseUrl . '/media/favicon.png' ?>">

        <title><?= Html::encode(Yii::$app->name) ?></title>
        <?php $this->head(); ?>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                <div class="overlay" style="display: none"></div>
                <div class="loading-img" style="display: none"></div>

                <div class="error-overlay" style="display: none">
                    <div class="col-middle">
                        <div class="text-center error-page">
                            <h1 class="error-number"></h1>
                            <h1><i class="fa fa-close text-danger" style="font-size: 360%"></i></h1>
                            <h2 class="error-message"></h2>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 30px">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="progress progress-striped horizontal">
                                <div role="progressbar" data-transitiongoal="45" aria-valuenow="45" class="progress-bar progress-bar-warning active" style="width: 100%;">
                                    Akan kembali ke halaman sebelumnya.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $this->beginBody() ?>

                <?php

                $appComponent = new AppComponent();
                echo $appComponent->navigation();
                echo $appComponent->header(); ?>

                <div class="right_col" role="main">
                    <div class="page-title">
                        <div id="title-page">
                            <h3>&nbsp;</h3>
                        </div>

                        <div id="breadcrumb-page" class="pull-left">
                            &nbsp;
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div id="main-content" class="col-md-12">

                            <?= $content ?>

                        </div>
                    </div>
                </div>

                <?= $appComponent->appFooter() ?>
            </div>
        </div>

        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage() ?>
