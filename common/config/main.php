<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'ru',
    'sourceLanguage'=>'ru-RU',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'i18n' => [
            'translations' => [
                'rbac-admin' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@mdm/admin/messages',
                    'sourceLanguage' => 'ru-RU',
                    'fileMap' => [
                        'rbac-admin' => 'rbac-admin.php',
                    ],
                ],
            ],
        ],

        'user' => [
            'class'=>'yii\web\User',
            'identityClass' => 'yii\web\User',
            'enableAutoLogin' => true,
        ],

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => true,
            'rules'=>[

            ]
        ],
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'GD',  //GD or Imagick
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport'=>false,
            'messageConfig' => [
                'from' => ['robot@chto-kak.ru' => 'Admin'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ],
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.ukraine.com.ua',
                'username' => 'support@hint-box.ru',
                'password' => 'robot123456',
                'port' => '25',
            ],
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],

    ],

    'modules' => [

        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
            // other module settings
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // other module settings
        ],

    ],

];
