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
                            'label'=>'Dashboard',
                            'url'=>'site/index',
							'type'=>TopNavMenu::TYPE_CONTENT,
                            'items'=>[
                            ]
                        ],
						[
                            'label'=>'Features',
							'type'=>TopNavMenu::TYPE_CONTENT,
                            'items'=>[
								[
									'label'=>'eCommerce',
									'items'=>[
										[
											'label'=>'eCommerce',
											'url'=>'/site/eCommerce',
											'iconClass'=>'icon-home',
										],
										[
											'label'=>'Manage Orders',
											'url'=>'/site/Manage_Orders',
											'iconClass'=>'icon-basket',
										],
									]
								],
								[
									'label'=>'Layouts',
									'items'=>[
										[
											'label'=>'Fluid Layout',
											'url'=>'site/Fluid_Layout',
											'iconClass'=>'icon-cursor-move',
										],
										[
											'label'=>'Fixed Mega Menu',
											'url'=>'site/Fixed_Mega_Menu',
											'iconClass'=>'icon-pin',
										],
									]
								],
                            ]
                        ],
						[
                            'label'=>'Features full screen',
							'type'=>TopNavMenu::TYPE_CONTENT_FULL,
                            'items'=>[
								[
									'label'=>'eCommerce',
									'items'=>[
										[
											'label'=>'eCommerce',
											'url'=>'site/eCommerce',
											'iconClass'=>'icon-home',
										],
										[
											'label'=>'Manage Orders',
											'url'=>'site/Manage_Orders',
											'iconClass'=>'icon-basket',
										],
									]
								],
								[
									'label'=>'Layouts',
									'items'=>[
										[
											'label'=>'Fluid Layout',
											'url'=>'site/Fluid_Layout',
											'iconClass'=>'icon-cursor-move',
										],
										[
											'label'=>'Fixed Mega Menu',
											'url'=>'site/Fixed_Mega_Menu',
											'iconClass'=>'icon-pin',
										],
									]
								],
								[
									'label'=>'Layouts',
									'items'=>[
										[
											'label'=>'Fluid Layout',
											'url'=>'site/Fluid_Layout',
											'iconClass'=>'icon-cursor-move',
										],
										[
											'label'=>'Fixed Mega Menu',
											'url'=>'site/Fixed_Mega_Menu',
											'iconClass'=>'icon-pin',
										],
									]
								],
                            ]
                        ],
                        [
                            'label'=>'TYPE_DROPDOWN',
                            'url'=>'/site/index',
							'type'=>TopNavMenu::TYPE_DROPDOWN,
                            'options'=>[
                                'class'=>TopNavMenu::TYPE_DROPDOWN,
                            ],
                            'items'=>[
                                [
                                    'label'=>' Data Tables',
                                    'url'=>'/site/index',
                                    'iconClass'=>'icon-home',
                                ],
                                [
                                    'label'=>'TYPE_DROPDOWN_2',
                                    'url'=>'/site/index',
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
													'url'=>'site/index',
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
