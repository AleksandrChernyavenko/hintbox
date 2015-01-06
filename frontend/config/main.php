<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

if(YII_DEBUG)
{
    ini_set('display_error',1);
}

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
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

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>
            [
                'cat/<id:\d+>-<title:.*?>'=>'/category/default/view',
                '/cat/<id:\d+>-<title:.*?>'=>'/category/default/view',
                '<id:\d+>-<title:.*?>'=>'article/default/view',
            ]
        ],

    ],

    'modules'=>[
        'category' => [
            'class' => 'frontend\modules\category\Category',
        ],
        'article' => [
            'class' => 'frontend\modules\article\ArticleModule',
        ],
    ],

    'params' => $params,
];
