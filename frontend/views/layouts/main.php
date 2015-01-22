<?php
use yii\helpers\Html;

use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="background-color-header">
    <?php $this->beginBody() ?>

    <?= $this->render('_top', []) ?>

    <div class="wrap background-color-content">



        <div class="container">

            <div class="row" style="margin: 0 auto 20px;width: 728px;  height: 90px;">



                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- - 728*90 СНИЗУ 1 -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                         data-ad-client="ca-pub-7268195266553329"
                         data-ad-slot="7971531091"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>

            </div>

            <div class="clearfix "></div>

         <div class="row">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
         </div>

        <div class="row"> <?= Alert::widget() ?> </div>




            <div class="row">

                <div class="col-md-10 drop-shadow-article background-color-white main-page-container">
                    <?= $content ?>
                </div>
                <?
                $ads = <<< JS
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- - АДАПТИВНЫЙ -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7268195266553329"
     data-ad-slot="6215596299"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
JS;

                ?>
                <div class="col-md-2 rigth-col">
                    <?= \frontend\widgets\RelatedArticleWidget::widget(
                        [
                            'countRelated'=>4,
                            'htmlTemplate'=>'<div class="row related_article drop-shadow-article background-color-white">Похожие статьи</div><div class="wrapper"><div class="row">{element}</div><div class="row">'.$ads.'</div><div class="row">{element}</div><div class="row">{element}</div><div class="row">{element}</div><div class="row">{element}</div><div class="row">{element}</div></div>',
                        ]
                    ); ?>
                </div>


            </div>


            <div class="row" style="margin: 20px auto ;width: 728px;  height: 90px;">

                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!--  - 728*90 СНИЗУ 2 -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:728px;height:90px"
                     data-ad-client="ca-pub-7268195266553329"
                     data-ad-slot="1924997499"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>

            </div>

        </div>

    </div>

    <?= $this->render('_footer', []) ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
