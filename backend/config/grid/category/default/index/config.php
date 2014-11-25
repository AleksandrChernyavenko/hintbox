<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 19.11.2014
 * Time: 17:11
 */
use yii\helpers\Html;


return [
    ['class' => 'yii\grid\SerialColumn'],

    'id',
    'parent_id',
    'name',
    [
        'attribute'=>'image',
        'label'=>'image',
        'format' => 'raw',
        'value'=>function ($model) {
            /** @var $model \common\models\Category */

            return Html::img($model->getSrc());
        },
    ],
    'status',

    ['class' => 'yii\grid\ActionColumn'],
];