<?php

use yii\helpers\Html;
use common\widgets\ExtDetailView;

/** @var $this yii\web\View */
/** @var $model \backend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="article-view" id="article">

    <h1><?= Html::encode($model->title) ?></h1>

    <hr>

    <div class="description">
        <?= $model->description ?>
    </div>

    <div class="article_decs">
        <?= $model->article_decs ?>
    </div>

    <div class="content">
        <?= $model->content ?>
    </div>

    <div class="origin_url">
        <?= $model->origin_url ?>
    </div>

    <div class="status">
        <?= $model->status ?>
    </div>

    <div class="default_image">
        <?= $model->default_image ?>
    </div>

    <div class="create">
        <?= $model->create ?>
    </div>

    <div class="update">
        <?= $model->update ?>
    </div>

    <?= ExtDetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'category_id',
                'format'=>'raw',
                'value'=> function ($model, $index) {
                    /** @var $model \backend\models\Article */
                   return $model->category->getLink();
                },
            ],
            'title',
            'description',
            'article_decs:ntext',
            'content:ntext',
            'origin_url:url',
            'status',
            'default_image:ntext',
            'create',
            'update',
        ],
    ]) ?>

</div>
