<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 05.01.2015
 * Time: 16:34
 */

use \common\metronic\widgets\TopNavMenu;

return [
    [
        'label'=>'Главная',
        'url' => ['/site/index'],
        'iconClass'=>'icon-home',
        'type'=>TopNavMenu::TYPE_CONTENT,
        'items'=>[
        ]
    ],
    [
        'label'=>'Контент',
        'type'=>TopNavMenu::TYPE_DROPDOWN,
        'iconClass'=>'icon-home',
        'items'=>[
            [
                'label'=>'Статьи',
                'url'=>'/article/default/index',
                'iconClass'=>'icon-home',
            ],
            [
                'label'=>'Категории',
                'url'=>'/category/default/index',
                'iconClass'=>'icon-wallet',
            ],
            [
                'label'=>'Пользователи',
                'url'=>'/user/default/index',
                'iconClass'=>'icon-wallet',
            ],
            [
                'label'=>'Виджеты',
                'url'=>'/widgets/default/index',
                'iconClass'=>'icon-envelope',
                'items'=>[
                    [
                        'label'=>'Предсказания',
                        'url'=>'/widgets/prev/index',
                        'iconClass'=>'icon-envelope',

                    ],
                    [
                        'label'=>'Анекдоты',
                        'url'=>'/widgets/anec/index',
                        'iconClass'=>'icon-wallet',
                    ],
                ]
            ],
        ]
    ],
    [
        'label'=>'Трекер',
        'type'=>TopNavMenu::TYPE_DROPDOWN,
        'items'=>[
            [
                'label'=>'Статистика',
                'url'=>'/',
                'iconClass'=>'icon-home',
            ],
            [
                'label'=>'Сайты',
                'url'=>'/sites/default/index',
                'iconClass'=>'icon-wallet',
            ],
            [
                'label'=>'Коротки ссылки',
                'url'=>'site/index',
                'iconClass'=>'icon-puzzle',
                'items'=>[
                    [
                        'label'=>'TYPE_DROPDOWN_3_1',
                        'url'=>'site/index',
                        'iconClass'=>'icon-home',

                    ],
                    [
                        'label'=>'TYPE_DROPDOWN_3_2',
                        'url'=>'site/index',
                        'iconClass'=>'icon-wallet',
                    ],
                    [
                        'label'=>'TYPE_DROPDOWN_3_3',
                        'url'=>'site/index',
                        'iconClass'=>'icon-puzzle',
                    ],
                    [
                        'label'=>'TYPE_DROPDOWN_3',
                        'url'=>'site/index',
                        'iconClass'=>'icon-puzzle',
                        'items'=>[
                            [
                                'label'=>'TYPE_DROPDOWN_3_1 active',
                                'url'=>'site/index',
                                'iconClass'=>'icon-home',

                            ],
                            [
                                'label'=>'TYPE_DROPDOWN_3_2',
                                'url'=>'/user/login',
                                'iconClass'=>'icon-wallet',
                            ],
                            [
                                'label'=>'TYPE_DROPDOWN_3_3',
                                'url'=>'site/index',
                                'iconClass'=>'icon-puzzle',
                            ],

                        ]
                    ],

                ]
            ],
            [
                'label'=>'Коды js',
                'url'=>'site/index',
                'iconClass'=>'icon-wallet',
            ],
        ]
    ],
    [
        'label'=>'Дорвеи',
        'type'=>TopNavMenu::TYPE_DROPDOWN,
        'items'=>[
            [
                'label'=>'Статистика',
                'url'=>'/dorvei/default/index',
                'iconClass'=>'icon-home',
            ],
            [
                'label'=>'Категории',
                'url'=>'/dorvei/category/index',
                'iconClass'=>'icon-wallet',
            ],
            [
                'label'=>'TYPE_DROPDOWN_4',
                'url'=>'site/index',
                'iconClass'=>'icon-wallet',
            ],
        ]
    ],
    [
        'label'=>'Система',
        'type'=>TopNavMenu::TYPE_DROPDOWN,
        'items'=>[
            [
                'label'=>'Настройки',
                'url'=>'/dorvei/default/index',
                'iconClass'=>'icon-home',
            ],
        ]
    ],
];