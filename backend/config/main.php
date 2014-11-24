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
    'bootstrap' => ['log'],


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

        'category' => [
            'class' => 'backend\modules\category\Category',

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
    'components' => [

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
    'params' => $params,
];
