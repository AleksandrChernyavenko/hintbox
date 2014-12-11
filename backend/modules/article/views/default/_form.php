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
                ]),

        ]);
    ?>

    <?= $form->field($model, 'origin_url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->dropDownList($model::getEnumClientValues('status'), ['prompt' => '']) ?>

    <?= $form->field($model, 'default_image')->textarea(['rows' => 6]) ?>

    <?php
    echo \newerton\jcrop\jCrop::widget([
        // Image URL
        'url' =>  \Yii::$app->staticUrlManager->baseUrl . "/images/article/{$model->id}/".$model->default_image,
        // options for the IMG element
        'imageOptions' => [
            'id' => 'imageId',
            'width' => 600,
            'alt' => 'Crop this image'
        ],
        // Jcrop options (see Jcrop documentation [http://deepliquid.com/content/Jcrop_Manual.html])
        'jsOptions' => array(
            'minSize' => [204, 204],
            'aspectRatio' => 1,
            'onRelease' => new yii\web\JsExpression("function() {ejcrop_cancelCrop(this);}"),
            'onChange' => new yii\web\JsExpression("function() { console.log(this) }"),
            //customization
            'bgColor' => '#FF0000',
            'bgOpacity' => 0.4,
            'selection' => true,
            'theme' => 'light',
        ),
        // if this array is empty, buttons will not be added
        'buttons' => array(
            'start' => array(
                'label' => 'Начать обработку',
                'htmlOptions' => array(
                    'class' => 'myClass',
                    'style' => 'color:red;'
                )
            ),
            'crop' => array(
                'label' => 'Применить обрезку',
            ),
            'cancel' => array(
                'label' => 'Отменить обрезку'
            )
        ),
        // URL to send request to (unused if no buttons)
        'ajaxUrl' => 'controller/ajaxcrop',
        // Additional parameters to send to the AJAX call (unused if no buttons)
        'ajaxParams' => ['someParam' => 'someValue'],
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
