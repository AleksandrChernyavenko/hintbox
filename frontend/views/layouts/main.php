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
<body>
    <?php $this->beginBody() ?>

    <?= $this->render('_top', []) ?>

    <div class="wrap">



        <div class="container">

         <div class="row">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
         </div>

        <div class="row"> <?= Alert::widget() ?> </div>


            <div class="row">

                <div class="col-md-10 drop-shadow-article">
                    <?= $content ?>
                </div>

                <div class="col-md-2">
                    <?= \frontend\widgets\RelatedArticleWidget::widget(
                        [
                            'countRelated'=>6,
                            'htmlTemplate'=>'<div class="wrapper"><div class="row">{element}</div><div class="row">{element}</div><div class="row">{element}</div><div class="row">{element}</div><div class="row">{element}</div><div class="row">{element}</div></div>',
                        ]
                    ); ?>
                </div>


            </div>


        </div>

    </div>

    <?= $this->render('_footer', []) ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
