<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 28.11.2014
 * Time: 9:30
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->widget(Select2::className(),
        [
            'data' => array_merge(["0" => "Основаня категори"], \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(),'id','textWithImage')),
            'language' => 'ru',
            'options' => ['placeholder' => 'Выберите категорию ...'],
            'pluginOptions' => [
                'formatResult' => new \yii\web\JsExpression("function format(state) { return state.text;}"),
                'formatSelection' => new \yii\web\JsExpression("function format(state) { return state.text;}"),
                'allowClear' => true
            ],
        ]

    ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'origin_url')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать',['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>