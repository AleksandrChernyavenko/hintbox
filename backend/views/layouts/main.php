<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

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
<body class="<?= Yii::$app->metronic->getBodyClass() ?>">
    <?php $this->beginBody() ?>

    <?= $this->render('_header'); ?>

    <div class="wrap page-content">
        <?php
//            $menuItems = [
//                ['label' => 'Главная', 'url' => ['/site/index']],
//                ['label' => 'Меню', 'url' => ['/admin/default/index']],
//                ['label' => 'Пользователи', 'url' => ['/site/login']],
//                ['label' => 'Статьи', 'url' => ['/article/default/index']],
//                ['label' => 'Категории', 'url' => ['/category/default/index']],
//            ];
//            if (Yii::$app->user->isGuest) {
//                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
//            } else {
//                $menuItems[] = [
//                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
//                    'url' => ['/site/logout'],
//                    'linkOptions' => ['data-method' => 'post']
//                ];
        ?>

        <div class="container">

            <?= \common\widgets\Alert::widget([]);?>


            <?= \common\metronic\widgets\MetronicBreadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="row portlet light">
         <?= $content ?>
        </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?= \common\widgets\AjaxLoadingWidget::widget(); ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
