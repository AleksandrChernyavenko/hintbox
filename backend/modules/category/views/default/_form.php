<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use mihaildev\elfinder\InputFile;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->widget(Select2::className(),

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


    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?=
    $form->field($model, 'image')->widget(\common\widgets\TbFileUpload::className(),
        [
            'form' => $form,
            'model' => $model,
            'attribute' => 'photo',
            'basePathLogo' => '/S/'
        ]);

    ?>


    <?= $form->field($model, 'image')->widget(InputFile::className(), [
            'language'      => 'ru',
            'controller'    => '/category/elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
            'options'       => ['class' => 'form-control'],
            'buttonOptions' => ['class' => 'btn btn-default'],
            'multiple'      => true       // возможность выбора нескольких файлов
        ]); ?>

    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'delete' => 'Delete', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
