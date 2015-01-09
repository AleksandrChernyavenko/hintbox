<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider \backend\models\Category */
/* @var $dataProvider \backend\models\CategorySearch */

$this->params['breadcrumbs'][] = $this->title;

$columns = [
    [
        'attribute'=>'id',
        'width'=>'100px',
    ],

    [
        'attribute'=>'created',
        'filterType'=>'\common\widgets\intervalDatepicker\IntervalDatepicker',
        'format'=>'raw',
        'width'=>'270px',
        'value'=>function ($model, $key, $index, $widget) {
            return $model->created;
        },
        'filterWidgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
    ],

    [
        'attribute'=>'updated',
        'filterType'=>'\common\widgets\intervalDatepicker\IntervalDatepicker',
        'format'=>'raw',
        'width'=>'270px',
        'filterWidgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
        'visible'=>false,
    ],

    'name',

    [
        'attribute'=>'image',
        'format'=>'raw',
        'width'=>'50px',
        'value'=>function ($model, $key, $index, $widget) {
                return $model->getSrc() ? Html::img($model->getSrc(),['style'=>'width: 50px;height: 50px;']) : YesNo::getLabel('');
            },
    ],



    [
        'attribute'=>'parent_id',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\Category::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
        'value'=>function ($model, $key, $index, $widget) {

                $category = $model->parent;

                if(!$category)
                {
                    return  \common\helpers\YesNo::getLabel('');
                }
                return $category->getLink();
            },
        'format'=>'raw',
        'width'=>'270px',
        'filterWidgetOptions'=>[
            'pluginOptions'=>[
                'allowClear'=>true,
                'escapeMarkup'=>new \yii\web\JsExpression("function(m) { return m; }"),
            ],
        ],
        'filterInputOptions'=>[
            'placeholder'=>'Все категории'
        ],
    ],


    [
        'attribute'=>'status',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>\common\enums\CategoryEnum::getClientLabelValues(),
        'format'=>'raw',
        'filterWidgetOptions'=>[
            'pluginOptions'=>[
                'allowClear'=>true,
                'escapeMarkup'=>new \yii\web\JsExpression("function(m) { return m; }"),
            ],
        ],
        'value'=>function ($model, $key, $index, $widget) {
            return \common\enums\CategoryEnum::getLabel($model->status);
        },
        'filterInputOptions'=>[
            'placeholder'=>'Все статусы'
        ],
    ],

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
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
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
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Категории</h3>',
                'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
                'after' => false
            ],
            'toolbar' =>  [
                ['content'=>
                    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'Add Book', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
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
