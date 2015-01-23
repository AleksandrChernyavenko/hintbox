<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = 'Редактирование предсказания: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Предсказания', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="category-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data','id'=>'form_id']]); ?>

        <div class="multiple_input">
            <?= $form->field($model, 'text')->textInput(['maxlength' => 255]) ?>
        </div>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редакрировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
