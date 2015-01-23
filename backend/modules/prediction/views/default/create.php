<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Prediction */

$this->title = 'Добавление предсказания(й)';
$this->params['breadcrumbs'][] = ['label' => 'Предсказания', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="category-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data','id'=>'form_id']]); ?>

        <? foreach($models as $model): ?>
        <div class="multiple_input">
            <?= $form->field($model, '[]text')->textInput(['maxlength' => 255]) ?>
        </div>
        <? endforeach; ?>

        <div class="form-group">
            <?= Html::submitButton('Добавить поле', [
                'class' => 'btn btn-info',
                'onClick'=>'{
                    var input =  $( ".multiple_input" ).first().clone();
                    input.prependTo( "#form_id" );
                    $( ".multiple_input" ).last().find("input").val("");

                return false;
             }',
            ]) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редакрировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
