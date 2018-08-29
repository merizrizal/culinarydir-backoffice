<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div id="wrapper">
    <div id="login" class=" form">

        <br><br>

        <section class="login_content" style="background-color: #fff; padding: 20px">

            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'parts' => [
                                '{icon}' => ''
                            ],
                            'template' => '<div class="has-feedback">
                                                {input}
                                                <span class="glyphicon {icon} form-control-feedback"></span>
                                                {error}
                                            </div>',
                        ]
                    ]); ?>


                <h1><?= Yii::$app->name ?></h1>
                <h4>Login</h4>

                <div class="form-group has-feedback">
                    <?= $form->field($model, 'login_id', [
                                'parts' => [
                                    '{icon}' => 'glyphicon-user'
                                ],
                            ])->textInput(['id' => 'login_id', 'class' => 'form-control', 'placeholder' => $model->getAttributeLabel('login_id')]) ?>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <?= $form->field($model, 'password', [
                                'parts' => [
                                    '{icon}' => 'glyphicon-lock'
                                ],
                            ])->passwordInput(['id' => 'password', 'class' => 'form-control', 'placeholder' => $model->getAttributeLabel('password')]) ?>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <?= Html::submitButton('<i class="fa fa-sign-in"></i> Login', ['class' => 'btn btn-default', 'name' => 'loginButton', 'value' => 'loginButton']) ?>

            <?php ActiveForm::end(); ?>

            <div class="clearfix"></div>

            <div class="separator">
                Crafted by Asikmakan Dev Team in Bandung.
            </div>
        </section>
    </div>
</div>

<?php
$cssscript = '
    .login-bg {
        background: url("' . Yii::$app->urlManager->baseUrl . '/media/img/7VSaiD1XA06bfK8NP.jpg") fixed;
        background-size: cover;
    }
';

$this->registerCss($cssscript);

$jscript = '
    $("body").addClass("login-bg");
';

$this->registerJs($jscript); ?>
