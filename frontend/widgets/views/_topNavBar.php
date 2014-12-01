<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 26.11.2014
 * Time: 12:51
 */


use kartik\nav\NavX;

/**
 * @var $category \frontend\models\Category[]
 * @var $mainCategorys \frontend\models\Category[]
 * @var $otherCategorys \frontend\models\Category[]
 * @var $cat \frontend\models\Category
 * @var $countElement int
 * @var
 *
 *
 */


$mainCategorys = array_slice($category, 0, $countElement);

$otherCategorys = array_slice($category, $countElement);


$items = [];

$html = <<<HTML
<div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
HTML;


$items[] = [
    'label' => 'Все категории', 'active'=>true, 'items' => [
        $html
    ]
];

foreach ($mainCategorys as $cat) {
    $item = [
        'label' => $cat->name,
        'url' => $cat->getAbsoluteUrl(),
    ];

    $items[] = $item;
}






echo NavX::widget([
        'options'=>['class'=>'nav navbar-nav'],
        'items' => $items,
//        'items' => [
//            ['label' => 'Action', 'url' => '#'],
//            ['label' => 'Submenu 1', 'active'=>true, 'items' => [
//                ['label' => 'Action', 'url' => '#'],
//                ['label' => 'Another action', 'url' => '#'],
//                ['label' => 'Something else here', 'url' => '#'],
//                '<li class="divider"></li>',
//                ['label' => 'Submenu 2', 'items' => [
//                    ['label' => 'Action', 'url' => '#'],
//                    ['label' => 'Another action', 'url' => '#'],
//                    ['label' => 'Something else here', 'url' => '#'],
//                    '<li class="divider"></li>',
//                    ['label' => 'Separated link', 'url' => '#'],
//                ]],
//            ]],
//            ['label' => 'Something else here', 'url' => '#'],
//            '<li class="divider"></li>',
//            ['label' => 'Separated link', 'url' => '#'],
//        ]
    ]);