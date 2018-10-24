<?php

use yii\helpers\Html;

/* @var $this yii\web\View */ ?>

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= Yii::$app->urlManager->createUrl(['']); ?>" class="site_title"><i class="fa fa-home"></i> <span><?= Html::encode(Yii::$app->name) ?></span></a>
        </div>

        <div class="clearfix"></div>

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">

                    <?php
                    if (!empty(Yii::$app->controller->module->params['navigation'])):
                        foreach (Yii::$app->controller->module->params['navigation'] as $navLevel1): ?>

                            <li class="<?= !empty($navLevel1['navigation']) ? 'tree' : '' ?>">

                                <?php
                                $aUrl = 'javascript:;';
                                $aClass = '';

                                if (!empty($navLevel1['url'])) {

                                    $aUrl = Yii::$app->urlManager->createUrl($navLevel1['url']);
                                    $aClass = 'menu ' . ($navLevel1['isDirect'] ? 'direct' : '');
                                } ?>

                                <a class="<?= $aClass ?>" href="<?= $aUrl ?>">
                                    <i class="<?= $navLevel1['iconClass'] ?>"></i>
                                    <?= Yii::t('app', $navLevel1['label']) ?>
                                    <?= !empty($navLevel1['navigation']) ? '<span class="fa fa-chevron-down"></span>' : '' ?>
                                </a>

                                <?php
                                if (!empty($navLevel1['navigation'])): ?>

                                    <ul class="nav child_menu">

                                        <?php
                                        foreach ($navLevel1['navigation'] as $navLevel2): ?>

                                            <li>
                                                <a class="menu <?= $navLevel2['isDirect'] ? 'direct' : '' ?>" href="<?= Yii::$app->urlManager->createUrl($navLevel2['url']); ?>">
                                                    <?= Yii::t('app', $navLevel2['label']) ?>
                                                </a>
                                            </li>

                                        <?php
                                        endforeach; ?>

                                    </ul>

                                    <?php
                                endif; ?>

                            </li>

                        <?php
                        endforeach;
                    endif; ?>

                </ul>
            </div>
        </div>
    </div>
</div>

<?php
$csscript = '
    .site_title i {
        border: none;
        padding: 0;
        border-radius: 0;
    }
    
    .site_title span {
        margin-left: 5px;
    }
';

$this->registerCss($csscript);

$jscript = '
    $(".menu").on("click", function() {

        if ($("body").hasClass("nav-sm")) {

            $(this).parent().parent().slideUp();
            $(this).parent().parent().parent().removeClass("active");
        }

        if (!$(this).hasClass("direct")) {

            var thisObj = $(this);

            $.ajax({
                cache: false,
                url: thisObj.attr("href"),
                beforeSend: function(xhr) {
                    $(".overlay").show();
                    $(".loading-img").show();
                },
                success: function(response) {

                    $("#main-content").html(response);

                    $(document).scrollTop(0);
                    $(".overlay").hide();
                    $(".loading-img").hide();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr);

                    $(".overlay").hide();
                    $(".loading-img").hide();

                    $(".error-overlay").find(".error-number").html(xhr.status);
                    $(".error-overlay").find(".error-message").html(xhr.responseText);
                    $(".error-overlay").show();

                    setTimeout(function() {
                        $(".error-overlay").hide();
                    }, 1000);
                }
            });

            return false;
        }
    });
';

$this->registerJs($jscript); ?>