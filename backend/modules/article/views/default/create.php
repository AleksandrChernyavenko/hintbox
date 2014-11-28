<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$this->title = 'Новая статья';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCreate', [
        'model' => $model,
    ]) ?>

</div>
