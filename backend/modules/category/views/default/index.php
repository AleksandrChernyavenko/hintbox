<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider \backend\models\Category */
/* @var $dataProvider \backend\models\CategorySearch */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;




$columns = [
    'id',
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
        'attribute'=>'date_start',
        'filterType'=>GridView::FILTER_DATE,
        'format'=>'raw',
        'width'=>'270px',
        'filterWidgetOptions'=>[
            'type'=>5,
            'attribute2'=>'date_end',
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
        'value'=>function ($model, $key, $index, $widget) {
               return $model->created;
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
                return Html::a($category->name, '#', [
                    'title'=>'View author detail',
                    'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")'
                ]);
            },
        'format'=>'raw',
        'width'=>'270px',
        'filterWidgetOptions'=>[
            'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>[
            'placeholder'=>'Все категории'
        ],
    ],


    [
        'attribute'=>'status',
        'filterType'=>GridView::FILTER_SELECT2,
        'format'=>'raw',
        'width'=>'270px',
        'filterWidgetOptions'=>[
            'options'=> [
                'multiple'=>true,
            ],
            'data'=>[
                \common\enums\CategoryStatusEnum::getClientValues()
            ],
            'pluginOptions' => [

            ]
        ],
        'value'=>function ($model, $key, $index, $widget) {
                $model->status = 'active, deleted';
                return $model->status;
            },
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
