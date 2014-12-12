<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use mihaildev\ckeditor\CKEditor;
use common\widgets\ElFinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(), 'id', 'name'),
        ['prompt'=>'Выберите категорию']
    ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'article_decs')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
            'editorOptions' => ElFinder::ckeditorOptions(['/article/elfinder/manager','article_id'=>$model->id],[
                    'disableNativeSpellChecker' => false,
                    'height' => '950px',
                ]),

        ]);
    ?>

    <?= $form->field($model, 'origin_url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->dropDownList($model::getEnumClientValues('status'), ['prompt' => '']) ?>

    <?= $form->field($model, 'default_image')->textarea(['rows' => 6]) ?>

    <?php
        echo $this->render('_jCrop',[ 'model'=>$model]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
