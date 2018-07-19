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
                <h2><?= Yii::$app->user->getIdentity()->full_name ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3 style="margin-top: 20px">&nbsp;</h3>
                <ul class="nav side-menu">
                    <li class="tree">
                        <a href="javascript:;">
                            <i class="fa fa-star"></i> <?= Yii::t('app', 'Membership') ?> <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['registry-business']); ?>">
                                    <?= Yii::t('app', 'All Registry') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['registry-business/index','type' => 'my']); ?>">
                                    <?= Yii::t('app', 'My Registry') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['registry-business-approval-log']); ?>">
                                    <?= Yii::t('app', 'Approval') ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tree">
                        <a href="javascript:;">
                            <i class="fa fa-star"></i> <?= Yii::t('app', 'Approved Member') ?> <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['business']); ?>">
                                    <?= Yii::t('app', 'All Member') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['business/index','type' => 'my']); ?>">
                                    <?= Yii::t('app', 'My Member') ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tree">
                        <a href="javascript:;">
                            <i class="fa fa-users"></i> <?= Yii::t('app', 'My KPI') ?> <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['business/kpi-by-consultant']); ?>">
                                    <?= Yii::t('app', 'KPI by Sales Consultant') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['business/kpi-by-month']); ?>">
                                    <?= Yii::t('app', 'KPI by Month') ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tree">
                        <a href="javascript:;">
                            <i class="fa fa-users"></i> <?= Yii::t('app', 'User Management') ?> <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['user']); ?>">
                                    <?= Yii::t('app', 'User') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['user-level']); ?>">
                                    <?= Yii::t('app', 'User Level') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['person']); ?>">
                                    <?= Yii::t('app', 'Person') ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tree">
                        <a href="javascript:;">
                            <i class="fa fa-users"></i> <?= Yii::t('app', 'Report') ?> <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['registry-business/report-by-district']); ?>">
                                    <?= Yii::t('app', 'Report by District') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['registry-business/report-by-village']); ?>">
                                    <?= Yii::t('app', 'Report by Village') ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tree">
                        <a href="javascript:;">
                            <i class="fa fa-wrench"></i> <?= Yii::t('app', 'Master Data') ?> <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['membership-type']); ?>">
                                    <?= Yii::t('app', 'Membership Type') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['product-category']); ?>">
                                    <?= Yii::t('app', 'Product Category') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['product']); ?>">
                                    <?= Yii::t('app', 'Product') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['category']); ?>">
                                    <?= Yii::t('app', 'Business Category') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['facility']); ?>">
                                    <?= Yii::t('app', 'Facility') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['rating-component']); ?>">
                                    <?= Yii::t('app', 'Rating Component') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['province']); ?>">
                                    <?= Yii::t('app', 'Province') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['city']); ?>">
                                    <?= Yii::t('app', 'City') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['region']); ?>">
                                    <?= Yii::t('app', 'Region') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['district']); ?>">
                                    <?= Yii::t('app', 'District') ?>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="<?= Yii::$app->urlManager->createUrl(['village']); ?>">
                                    <?= Yii::t('app', 'Village') ?>
                                </a>
                            </li>
                        </ul>
                    </li>
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