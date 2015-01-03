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


<?= FileUploadUI::widget([
    'model' => new \common\models\UploadedFileModel(),
    'attribute' => 'file',
    'url' => ['/article/fileUpload/upload', 'id' => $model->id,'type'=>'article'],
    'gallery' => true,
    'fieldOptions' => [
        'accept' => 'image/*'
    ],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    // ...
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
        'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
    ],
]);
?>