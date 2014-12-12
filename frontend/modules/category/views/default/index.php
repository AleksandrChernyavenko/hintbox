<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="category-index">

    <h1> <?= Html::img($model->getSrc(), ['style'=>'width: 30px;height: 30px;']); ?> <?= Html::encode($model->name) ?></h1>

    <hr>


    <?= \frontend\widgets\ArticleList::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_index',
        ]); ?>

</div>
