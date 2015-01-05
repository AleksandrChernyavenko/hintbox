<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 13:56
 *
 */

/* @var $this \yii\web\View */

echo \common\metronic\widgets\PageHeaderMain::widget([
    'headerTop'=>\common\metronic\widgets\PageHeaderTop::widget([
		'notification'=>\common\metronic\widgets\NotificationWidget::widget([]),
		'task'=>\common\metronic\widgets\TasksWidget::widget([
			'tasks'=> require(__DIR__ . '/tasks.php'),
		]),
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
					'label'=>'Выйти',
					'icon'=>'glyphicon glyphicon-log-out',
					'link'=>'/user/logout'
				],
			]
		]),
	]),
    'headerMenu'=>\common\metronic\widgets\PageHeaderMenu::widget(
        [
            'menu' => \common\metronic\widgets\TopNavMenu::widget([
				'items'=> require(__DIR__ . '/menu.php'),
                ]),
        ]
    ),
]);

?>
