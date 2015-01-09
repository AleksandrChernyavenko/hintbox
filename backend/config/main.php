<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);


return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log','metronic'],

    'components' => [

        'user' => [
            'class' => 'backend\modules\user\components\User',
            'identityClass' => '\backend\modules\user\models\User',
            'enableAutoLogin' => true,
        ],

        'i18n' => [
            'translations' => [
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => 'backend\modules\user\messages',
                    'sourceLanguage' => 'ru-RU',
                    'fileMap' => [
                        'user' => 'user.php',
                    ],
                ],
            ],
        ],

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>[
                'users/login' => 'users/default/login',

                '<controller:\w+>/<action:\w+>/<id:\d+>'        => '<controller>/<action>',
                '/<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'        => '/<module>/<controller>/<action>',
            ]
        ],

        'metronic' => [
            'class' => 'common\metronic\Metronic',
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
    ],

    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // it can be '@path/to/your/layout'.
            'controllerMap' => [

                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'amnah\yii2\user\models\User',
                ],
                'other' => [
                    'class' => 'path\to\OtherController', // add another controller
                ],
            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grand Access' // change label
                ],
                'route' => null, // disable menu route
            ]
        ],

        'article' => [
            'class' => 'backend\modules\article\ArticleModule',

            'controllerMap' => [

                'fileUpload' => [
                    'class' => 'common\controllers\FileController', // add another controller
                ],
            ]

        ],

        'user' => [
            'class' => 'backend\modules\user\Module',
        ],

        'system' => [
            'class' => 'backend\modules\system\SystemModule',
        ],

        'category' => [
            'class' => 'backend\modules\category\CategoryModule',

            'controllerMap' => [
                'elfinder' => [
                    'class' => 'mihaildev\elfinder\Controller',
                    'access' => ['@'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
                    'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
                    'roots' => [
                        [
                            'baseUrl'=>'@web',
                            'basePath'=>'@backend/web',
                            'path' => 'images/uploads',
                            'name' => 'Global'
                        ],
                        [
                            'class' => 'mihaildev\elfinder\UserPath',
                            'path'  => 'images/user_{id}',
                            'name'  => 'My Documents'
                        ],
                        [
                            'path' => 'images/some',
                            'name' => 'Some Name' //перевод Yii::t($category, $message)
                        ],
                        [
                            'path'   => 'images/some',
                            'name'   =>'images/some', // Yii::t($category, $message)
                            'access' => ['read' => '*', 'write' => 'UserFilesAccess'] // * - для всех, иначе проверка доступа в даааном примере все могут видет а редактировать могут пользователи только с правами UserFilesAccess
                        ]
                    ]
                ]
            ],


        ],

    ],

    'params' => $params,
];
