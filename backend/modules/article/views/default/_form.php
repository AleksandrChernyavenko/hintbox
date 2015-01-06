<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
             'label' => 'Изображение',
              'content' => $this->render('form/_form3',['form'=>$form,'model'=>$model]),
              'headerOptions' => [''],
            ],
      ]
    ]);
    ?>

</div>
