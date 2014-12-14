<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="category-index">

    <h1> Список категорий </h1>

    <hr>

    <?= \frontend\widgets\ArticleList::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_index',
        ]); ?>

</div>
