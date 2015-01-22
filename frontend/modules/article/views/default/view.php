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

        <div>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- HINT-BOX.RU - 728*90 Центр 1 -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-7268195266553329"
                 data-ad-slot="2316334290"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

        </div>

        <div class="content">
        <?= $model->content ?>
        </div>

    </div>

    <br>

    <div class="related_in_article_bottom">
        <h3>Вам также может быть интересно :</h3>
        <?= \frontend\widgets\RelatedArticleWidget::widget([
        ]); ?>
    </div>

</div>
