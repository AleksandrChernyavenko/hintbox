<?php

use yii\helpers\Html;
use common\widgets\ExtDetailView;

/** @var $this yii\web\View */
/** @var $model \backend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны что хотите удалить данный елемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
//            'category_id'=>function($model) { return $model->id; },
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
