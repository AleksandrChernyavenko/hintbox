<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProvider \backend\models\ArticleSearch */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;



$columns = [
    ['class'=>'kartik\grid\SerialColumn', 'order'=>DynaGrid::ORDER_FIX_LEFT],
    'id',
    'title',
    'description',
    'article_decs',
    [
        'attribute'=>'date_start',
        'filterType'=>GridView::FILTER_DATE,
        'format'=>'raw',
        'width'=>'170px',
        'filterWidgetOptions'=>[
            'type'=>5,
            'attribute2'=>'date_end',
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
    ],
    [
        'class'=>'kartik\grid\BooleanColumn',
        'attribute'=>'status',
        'vAlign'=>'middle',
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
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DynaGrid::widget([
        'columns'=>$columns,
        'gridOptions'=>[
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'panel'=>['heading'=>'<h3 class="panel-title">Library</h3>'],
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
