<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.01.2015
 * Time: 15:45
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

use common\extensions\ckeditor\CKEditor;
use common\widgets\ElFinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>



<?= $form->field($model, 'content')->widget(CKEditor::className(), [
    'editorOptions' => ElFinder::ckeditorOptions(['/article/elfinder/manager','article_id'=>$model->id],[
        'extraPlugins' => 'dragresize',
        'disableNativeSpellChecker' => false,
        'height' => '950px',
    ]),

]);
?>


<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>
