<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 12.12.2014
 * Time: 10:04
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

/* @var $form yii\widgets\ActiveForm */

?>


<div class="raw">
    <div class="col-md-5">
        <?= $form->field($model, 'similar')->widget(\backend\widgets\SimilarWidget::className()); ?>
    </div>

</div>

<div class="clearfix"></div>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

