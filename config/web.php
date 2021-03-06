<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'       => 'ru',
    'sourceLanguage' => 'ru',
    'timeZone'       => 'Europe/Moscow',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\AdminModule',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ckjBBLDnUQQLkxoVK_4_K_S_dGoiRP0K',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                /*[
                    'pattern' => '<controller>/<action>',
                    'route'   => '<controller>/<action>',
                ],*/

                [
                    'pattern' => 'admin/<controller>/<action:(view|update|delete)>/<id:\d+>',
                    'route'   => 'admin/<controller>/<action>',
                ],
                [
                    'pattern' => 'admin/<controller>/<action>',
                    'route'   => 'admin/<controller>/<action>',
                ],

                [
                    'pattern' => '<type:(politika|obschestvo|istorija_kultura|sobytija|ekonomika|video|eng)>/<url:\S+>',
                    'route'   => 'site/detail',
                ],
                [
                    'pattern' => '<type:(politika|obschestvo|istorija_kultura|sobytija|ekonomika|video|eng)>',
                    'route'   => 'site/index',
                ],
                [
                    'pattern' => '/',
                    'route'   => 'site/index',
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
