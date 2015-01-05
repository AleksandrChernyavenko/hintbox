<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 05.01.2015
 * Time: 19:57
 */

use common\metronic\widgets\TasksWidget;


return [
    [
        'label'=>'Статьи за сегодня',
        'percent'=>function($array,$defaultValue) {

            $today = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
            $count = \common\models\Article::find()->andWhere('created >= :date',[':date'=>$today])->count();

            $count = ($count/10)*100;

            return (int)$count < 100 ? $count : 100;
        },
        'type'=>function($task,$percent)
        {
            return ($percent < 100) ? TasksWidget::TYPE_DANGER : TasksWidget::TYPE_SUCCESS;
        }
    ],
    [
        'label'=>'Статьи за месяц',
        'percent'=>function($array,$defaultValue) {

            $today = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")-1  , date("d"), date("Y")));
            $count = \common\models\Article::find()->andWhere('created >= :date',[':date'=>$today])->count();
            $count = ($count/240)*100;

            return (int)$count < 100 ? $count : 100;
        },
        'type'=>function($task,$percent)
        {
            return ($percent < 100) ? TasksWidget::TYPE_DANGER : TasksWidget::TYPE_SUCCESS;
        }
    ],
];