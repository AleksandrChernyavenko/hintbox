<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProvider \backend\models\search\ArticleSearch */

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

    'title',
    'article_decs',


    [
        'attribute'=>'category_id',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\Category::find()->orderBy('name')->asArray()->all(), 'id', 'textWithImage'),
        'value'=>function ($model, $key, $index, $widget) {

            $category = $model->category;
            if(!$category)
            {
                return 'Не выбранна';
            }
            return $category->getLink();
        },
        'format'=>'raw',
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
        'filter'=>\common\enums\ArticleEnum::getClientLabelValues(),
        'value'=>function ($model, $key, $index, $widget) {
            return \common\enums\ArticleEnum::getLabel($model->status);
        },
        'format'=>'raw',
        'filterWidgetOptions'=>[
            'pluginOptions'=>[
                'allowClear'=>true,
                'escapeMarkup'=>new \yii\web\JsExpression("function(m) { return m; }"),
            ],
        ],
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
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая статья', ['create'], ['class' => 'btn btn-success']) ?>
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
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>Список статей</h3>',
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

//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'category_id',
//            'title',
//            'description',
//            'article_decs:ntext',
//            // 'content:ntext',
//            // 'origin_url:url',
//            // 'status',
//            // 'default_image:ntext',
//            // 'create',
//            // 'update',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
    ]); ?>

</div>
