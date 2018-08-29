<?php
use yii\helpers\Html; ?>

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= Yii::$app->urlManager->createUrl(['']); ?>" class="site_title"><span><?= Html::encode(Yii::$app->name) ?></span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?= Yii::getAlias('@uploadsUrl') . (!empty(Yii::$app->user->getIdentity()->image) ? Yii::$app->user->getIdentity()->thumb('/img/user/', 'image', 200, 200) : '/img/user/default-avatar.png') ?>" class="img-circle profile_img" alt="User Image" />
            </div>
            <div class="profile_info">
                <span><?= Yii::t('app', 'Welcome') ?>,</span>
                <h2><?= Yii::$app->user->getIdentity()->full_name ?></h2>*/?>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3 style="margin-top: 20px">&nbsp;</h3>
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
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">

        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<?php
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