<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.01.2015
 * Time: 15:45
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

use mihaildev\ckeditor\CKEditor;
use common\widgets\ElFinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>


<?= $form->field($model, 'category_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'name'),
    ['prompt'=>'Выберите категорию']
); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'article_decs')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'origin_url')->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'status')->dropDownList($model::getEnumClientValues('status'), ['prompt' => '']) ?>

<?= $form->field($model, 'default_image')->hiddenInput(['id'=>'hidden_default_image']) ?>


<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>