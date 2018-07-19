<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">

                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= Yii::getAlias('@uploadsUrl') . (!empty(Yii::$app->user->getIdentity()->image) ? Yii::$app->user->getIdentity()->thumb('/img/user/', 'image', 200, 200) : '/img/user/default-avatar.png') ?>" alt="User Image"><?= Yii::$app->user->getIdentity()->full_name ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl('site/logout'); ?>" data-method="post"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a id="bardatetime" class="bar">
                        Date Time
                    </a>
                </li>

            </ul>
        </nav>
    </div>

</div>

<?php
$jscript = '
    var datetimeStatus = function() {
        var date = 0;
        var time = 0;
        $.when(
            $.ajax({
                type: "GET",
                url: "' . Yii::$app->urlManager->createUrl(['site/get-datetime']) . '",
                success: function(data) {
                    date = data.date;
                    time = data.time
                }
            })
        ).done(function() {
            $("#bardatetime").html("").append(date).append("&nbsp;&nbsp;&nbsp;").append(time);
        });
    };

    datetimeStatus();

    setInterval(function () {
        datetimeStatus();
    }, 1000 * 60);
';

$this->registerJs($jscript); ?>