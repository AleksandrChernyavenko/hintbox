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
        'label'=>'Система',
        'type'=>TopNavMenu::TYPE_DROPDOWN,
        'items'=>[
            [
                'label'=>'Настройки',
                'url'=>'/dorvei/default/index',
                'iconClass'=>'icon-home',
            ],
            [
                'label'=>'Admin Module',
                'url'=>'/admin/default/index',
                'iconClass'=>'icon-home',
            ],
            [
                'label'=>'Очистка кеша',
                'url'=>'/system/default/clear-cache',
                'iconClass'=>'icon-home',
            ],
            [
                'label'=>'Очистка assets',
                'url'=>'/system/default/clear-assets',
                'iconClass'=>'icon-home',
            ],
        ]
    ],
];