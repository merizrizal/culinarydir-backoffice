<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backoffice',
    'language' => 'id',
    'name' => 'Asikmakan',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backoffice\controllers',
    'bootstrap' => ['log'],
    'defaultRoute' => 'main/index',
    //'catchAll' => ['site/maintenance'], //dont delete, just comment to deactive
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
        'marketing' => [
            'class' => 'backoffice\modules\marketing\MarketingModule',
        ],
        'approval' => [
            'class' => 'backoffice\modules\approval\ApprovalModule',
        ],
        'promo' => [
            'class' => 'backoffice\modules\promo\PromoModule',
        ],
        'driver' => [
            'class' => 'backoffice\modules\driver\DriverModule',
        ],
        'usermanager' => [
            'class' => 'backoffice\modules\usermanager\UserManagerModule',
        ],
        'masterdata' => [
            'class' => 'backoffice\modules\masterdata\MasterDataModule',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backoffice-asikmakan-synctech',
        ],
        'user' => [
            'identityClass' => 'core\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backoffice-asikmakan-synctech', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'backoffice-asikmakan',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\w+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ]
        ],
    ],
    'params' => $params,
];
