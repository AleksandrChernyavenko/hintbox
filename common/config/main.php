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
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => 'amnah\yii2\user\messages',
                    'sourceLanguage' => 'ru-RU',
                    'fileMap' => [
                        'user' => 'user.php',
                    ],
                ],
            ],
        ],

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => true,
        ],


        'user' => [
            'class' => 'amnah\yii2\user\components\User',
            'enableAutoLogin' => true,
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
        'user' => [
            'class' => 'amnah\yii2\user\Module',
        ],
    ],

];
