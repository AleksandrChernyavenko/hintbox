<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 12.12.2014
 * Time: 10:04
 */

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$pachUrl = \Yii::$app->staticUrlManager->baseUrl . "/images/article/{$model->id}/";

$this->registerJs("




    (function($) {
          $(document).ready(function() {
                  $( '#jCropContainer tbody' ).on('click', 'a.tableImagejCropHref', function() {
                      var href = '$pachUrl' + $( this ).attr('href');
                      $('#imageId').attr('src', href);
                      $('#imageId').attr('data-imageName',  $( this ).attr('href'));

                      $('#imageId').width( $('#imageId').get(0).naturalWidth);
                      $('#imageId').height( $('#imageId').get(0).naturalHeight);

                      return false;
                });

          });
}(jQuery));", \yii\web\View::POS_READY);

?>

<div id="jCropContainer">
    <div class="row">

        <div class="col-md-6">

            <?= \common\widgets\jcrop\jCrop::widget([
                // Image URL
                'url' =>  \Yii::$app->staticUrlManager->baseUrl . "/images/article/{$model->id}/".$model->default_image,
                // options for the IMG element
                'imageOptions' => [
                    'id' => 'imageId',
                    'width' => '100%',
                    'data-imageName'=>$model->default_image,
                    'alt' => 'Crop this image'
                ],
                // Jcrop options (see Jcrop documentation [http://deepliquid.com/content/Jcrop_Manual.html])
                'jsOptions' => array(
                    'minSize' => [204, 204],
                    'setSelect' => [0, 0, 250, 250],
                    'aspectRatio' => 1,
                    'onRelease' => new yii\web\JsExpression("function() {ejcrop_cancelCrop(this);}"),
                    //customization
                    'bgColor' => '#424242',
                    'bgOpacity' => 0.2,
                    'selection' => true,
                    'theme' => 'light',
                ),
                // if this array is empty, buttons will not be added
                'buttons' => array(
                    'start' => array(
                        'label' => 'Начать обработку',
                        'htmlOptions' => array(
                            'class' => 'myClass',
                            'style' => 'color:black;'
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
                'ajaxUrl' => \yii\helpers\Url::to(['/article/default/ajaxcrop'],true),
                // Additional parameters to send to the AJAX call (unused if no buttons)
                'ajaxParams' => [
                    'articleId'=>$model->id,
                    'fileName' => new yii\web\JsExpression("function() {
                                return  $('#imageId').attr('data-imageName');
                     }"),
                ],
            ]);
        ?>

        </div>

        <div class="col-md-6">
            все картинки

            <?
            $model->renderTableOfImage();
            ?>
        </div>

    </div>


</div>