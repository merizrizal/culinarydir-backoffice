<?php
use yii\helpers\Html; ?>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-address-book"></i></div>
            <br><br>
            <div class="col-xs-12"><h3>Marketing</h3></div>
            <br><br>

            <div class="col-xs-12">
                <?= Html::a('<i class="fa fa-sign-in-alt"></i> ' . Yii::t('app', 'Enter'), ['/marketing'], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                <br>
            </div>

        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-clipboard-check"></i></div>
            <br><br>
            <div class="col-xs-12"><h3>Approval</h3></div>
            <br><br>

            <div class="col-xs-12">
                <?= Html::a('<i class="fa fa-sign-in-alt"></i> ' . Yii::t('app', 'Enter'), ['/approval'], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                <br>
            </div>

        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
            <br><br>
            <div class="col-xs-12"><h3>Promo</h3></div>
            <br><br>

            <div class="col-xs-12">
                <?= Html::a('<i class="fa fa-sign-in-alt"></i> ' . Yii::t('app', 'Enter'), ['/promo'], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                <br>
            </div>

        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fas fa-user"></i></div>
            <br><br>
            <div class="col-xs-12"><h3>Driver</h3></div>
            <br><br>

            <div class="col-xs-12">
                <?= Html::a('<i class="fa fa-sign-in-alt"></i> ' . Yii::t('app', 'Enter'), ['/driver'], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                <br>
            </div>

        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-user"></i></div>
            <br><br>
            <div class="col-xs-12"><h3>User Manager</h3></div>
            <br><br>

            <div class="col-xs-12">
                <?= Html::a('<i class="fa fa-sign-in-alt"></i> ' . Yii::t('app', 'Enter'), ['/usermanager'], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                <br>
            </div>

        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-wrench"></i></div>
            <br><br>
            <div class="col-xs-12"><h3>Master Data</h3></div>
            <br><br>

            <div class="col-xs-12">
                <?= Html::a('<i class="fa fa-sign-in-alt"></i> ' . Yii::t('app', 'Enter'), ['/masterdata'], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                <br>
            </div>

        </div>
    </div>
</div>

<?php
$jscript = '
    $("#title-page").find("h3").html("");
    $("#breadcrumb-page").html("");
';

$this->registerJs($jscript); ?>