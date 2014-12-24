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
            'title',
            'article_decs:ntext',
            'content:ntext',
            'origin_url:url',
            'status',
            [
                'label'=>$model->getAttributeLabel('image'),
                'value' => $model->getSrc() ? Html::img($model->getSrc(),['class'=>'small_img_100']) : \common\helpers\YesNo::getLabel(''),
                'format'=>'raw',
            ],
            'created',
            'updated',
        ],
    ]) ?>

</div>
