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


$template = <<<TEMPLATE
<div class="btn-group main_page_row_list padding-15">
    <div class="thumbnail">
        <a href="{href}">
            <img src="{src}" alt="" class="main_page_category_list">

            <div class="text">
                <p>
                    {text}
                </p>
             </div>
        </a>
    </div>
</div>
TEMPLATE;

$html = '';
foreach ($otherCategorys as $cat) {
    $item = [
        'label' => $cat->name,
        'url' => $cat->getAbsoluteUrl(),
    ];

    $html .= strtr($template,
        [
            '{href}'=>$cat->getAbsoluteUrl(),
            '{src}'=>$cat->getSrc(),
            '{text}'=>$cat->getTextToPrew(),
        ]

    );
}

$html = <<<HTML
<div class="container">
        {$html}
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
        'options'=>['class'=>'nav navbar-nav nav-grey_menu'],
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