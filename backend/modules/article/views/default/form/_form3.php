<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.01.2015
 * Time: 15:45
 */


use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>



<?= $form->field($model, 'content')->widget(CKEditor::className(), [
    'editorOptions' => ElFinder::ckeditorOptions(['/article/elfinder/manager','article_id'=>$model->id],[
        'disableNativeSpellChecker' => false,
        'height' => '950px',
    ]),

]);
?>