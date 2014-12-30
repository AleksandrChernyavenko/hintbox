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
    'headerTop'=>\common\metronic\widgets\PageHeaderTop::widget(),
    'headerMenu'=>\common\metronic\widgets\PageHeaderMenu::widget(
        [
            'menu' => \common\metronic\widgets\TopNavMenu::widget([
                    'items'=>[
                        [
                            'label'=>'Главная',
                            'url' => ['/site/index'],
							'type'=>TopNavMenu::TYPE_CONTENT,
                            'items'=>[
                            ]
                        ],
                        [
                            'label'=>'Контент',
							'type'=>TopNavMenu::TYPE_DROPDOWN,
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
                                    'label'=>'TYPE_DROPDOWN_3',
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
									'label'=>'TYPE_DROPDOWN_4',
									'url'=>'site/index',
									'iconClass'=>'icon-wallet',
								],
                            ]
                        ],
                        [
                            'label'=>'Трекер',
							'type'=>TopNavMenu::TYPE_DROPDOWN,
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
                                    'label'=>'TYPE_DROPDOWN_3',
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
									'label'=>'TYPE_DROPDOWN_4',
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
                                    'label'=>'TYPE_DROPDOWN_3',
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
									'label'=>'TYPE_DROPDOWN_4',
									'url'=>'site/index',
									'iconClass'=>'icon-wallet',
								],
                            ]
                        ],
                    ]
                ]),
        ]
    ),
]);

?>
