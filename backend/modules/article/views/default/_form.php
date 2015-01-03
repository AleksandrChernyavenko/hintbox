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
    
    <?
    echo \yii\bootstrap\Tabs::widget([
         'items' => [
            [
             'label' => 'Основное',
             'content' => $this->render('form/_form1',['form'=>$form,'model'=>$model]),
             'active' => true
            ],
            [
             'label' => 'Содержимое',
                'content' => $this->render('form/_form2',['form'=>$form,'model'=>$model]),
              'headerOptions' => [''],
              'options' => ['id' => 'myveryownID'],
            ],
             [
             'label' => 'Изображения',
             'content' => 'Anim pariatur cliche...',
              'headerOptions' => [''],
            ],
      ]
    ]);
    ?>

    <?php
        echo $this->render('_jCrop',[ 'model'=>$model]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
