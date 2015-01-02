<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 13:56
 *
 */

use \common\metronic\widgets\TopNavMenu;

/* @var $this \yii\web\View */

echo \common\metronic\widgets\PageHeaderMain::widget([
    'headerTop'=>\common\metronic\widgets\PageHeaderTop::widget([
		'notification'=>\common\metronic\widgets\NotificationWidget::widget([]),
		'dropdownUser'=>\common\metronic\widgets\UserTopMenuWidget::widget([
			'elements'=>[
				[
					'label'=>'My Profile',
					'icon'=>'icon-user',
					'link'=>1
				],
				[
					'label'=>'My Profile',
					'icon'=>'icon-user',
					'link'=>1
				],
				'divider',
				[
					'label'=>'My Profile',
					'icon'=>'icon-user',
					'link'=>1
				],
				[
					'label'=>'My Profile',
					'icon'=>'icon-user',
					'link'=>1
				],
			]
		]),
	]),
    'headerMenu'=>\common\metronic\widgets\PageHeaderMenu::widget(
        [
            'menu' => \common\metronic\widgets\TopNavMenu::widget([
                    'items'=>[
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
                                    'url'=>'/category/default/index',
                                    'iconClass'=>'icon-wallet',
                                ],
								[
                                    'label'=>'Виджеты',
                                    'url'=>'/category/default/index',
                                    'iconClass'=>'icon-envelope',
									'items'=>[
										[
											'label'=>'Предсказания',
											'url'=>'site/index',
											'iconClass'=>'icon-envelope',

										],
										[
											'label'=>'Анекдоты',
											'url'=>'site/index',
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
                                    'url'=>'/category/default/index',
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
									'url'=>'/category/default/index',
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
                    ]
                ]),
        ]
    ),
]);

?>
