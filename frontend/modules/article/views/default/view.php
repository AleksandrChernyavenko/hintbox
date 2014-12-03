<?php

use yii\helpers\Html;
use common\widgets\ExtDetailView;

/** @var $this yii\web\View */
/** @var $model \backend\models\Article */

?>


<div class="article-view drop-shadow-article" id="article">
    <div class="article_inner">

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

    </div>

    <div class="article_inner">
        <?= \frontend\widgets\RelatedArticleWidget::widget(); ?>
    </div>

</div>
