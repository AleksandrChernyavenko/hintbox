<?php

use yii\helpers\Html;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProvider \backend\models\SimilarArticleSearch */

$this->params['breadcrumbs'][] = $this->title;

$columns = [
    [
        'attribute'=>'id',
        'width'=>'100px',
    ],

    [
        'attribute'=>'from_id',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\Category::find()->orderBy('name')->asArray()->all(), 'id', 'textWithImage'),
        'value'=>function ($model, $key, $index, $widget) {

            $article = \backend\models\Article::findByPk($model->from_id);
            if(!$article)
            {
                return 'Error';
            }

            $src = $article->getSrc();
            $text = $article->getTextToPrew();

            $html = <<< HTML
<div class="thumbnail related-thumbnail">
    <a href="javascript:;">
        <img src="{$src}">
        <div class="text">
            <p>$text</p>
        </div>
    </a>
</div>
HTML;

            return $html;
        },
        'width'=>'150px',
        'format'=>'raw',
        'filterWidgetOptions'=>[
            'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>[
            'placeholder'=>'Все статьи'
        ],
    ],


    [
        'attribute'=>'to_id',
        'filterType'=>GridView::FILTER_SELECT2,
        'filter'=>\yii\helpers\ArrayHelper::map(\backend\models\Category::find()->orderBy('name')->asArray()->all(), 'id', 'textWithImage'),
        'value'=>function ($model, $key, $index, $widget) {

            $article = \backend\models\Article::findByPk($model->to_id);
            if(!$article)
            {
                return 'Error';
            }

            $src = $article->getSrc();
            $text = $article->getTextToPrew();

            $html = <<< HTML
<div class="thumbnail related-thumbnail">
    <a href="javascript:;">
        <img src="{$src}">
        <div class="text">
            <p>$text</p>
        </div>
    </a>
</div>
HTML;

            return $html;
        },
        'width'=>'150px',
        'format'=>'raw',
        'filterWidgetOptions'=>[
            'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>[
            'placeholder'=>'Все статьи'
        ],
    ],


    [
        'class'=>'kartik\grid\ActionColumn',
        'dropdown'=>false,
        'order'=>DynaGrid::ORDER_FIX_RIGHT
    ],
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
