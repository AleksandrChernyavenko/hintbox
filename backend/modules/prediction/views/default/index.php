<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider \backend\models\Prediction */
/* @var $dataProvider \backend\models\PredicationSearch */

$this->params['breadcrumbs'][] = $this->title;

$columns = [
    [
        'attribute'=>'id',
        'width'=>'100px',
    ],


    'text',

    [
        'class'=>'kartik\grid\ActionColumn',
        'dropdown'=>false,
        'order'=>DynaGrid::ORDER_FIX_RIGHT
    ],

    ['class'=>'kartik\grid\CheckboxColumn',  'order'=>DynaGrid::ORDER_FIX_RIGHT],
];



?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?= DynaGrid::widget([
        'columns'=>$columns,
        'gridOptions'=>[
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'panel'=>['heading'=>'<h3 class="panel-title">Все записи</h3>'],

            'showPageSummary'=>true,
            'floatHeader'=>true,
            'pjax'=>true,

            'panel'=>[
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Список записей</h3>',
                'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
                'after' => false
            ],
            'toolbar' =>  [
                ['content'=>
                    Html::a('Добавление предсказания(й) '.'<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>'Add Book',]),
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
                ],
                ['content'=>'{dynagridFilter}{dynagridSort}{dynagrid}'],
                '{export}',
            ]

        ],


        'options'=>['id'=>'dynagrid-1'] // a unique identifier is important
    ]);



    ?>

</div>
