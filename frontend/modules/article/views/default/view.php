<?php

use yii\helpers\Html;
use common\widgets\ExtDetailView;

/** @var $this yii\web\View */
/** @var $model \backend\models\Article */

?>


<div class="article-view" id="article">
    <div class="article_inner article-full-view">

        <h1><?= Html::encode($model->title) ?></h1>

        <hr>

        <div class="article_decs">
        <?= $model->article_decs ?>
        </div>

        <div class="content">
        <?= $model->content ?>
        </div>

    </div>

    <br>

    <div class="related_in_article_bottom">
        <h3>Вам также может быть интересно :</h3>
        <?= \frontend\widgets\RelatedArticleWidget::widget([
            'models'=>\frontend\models\Article::find()->limit(8)->addOrderBy('RAND()')->all(),
        ]); ?>
    </div>

</div>
