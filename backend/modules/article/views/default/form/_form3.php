<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 12.12.2014
 * Time: 10:04
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$pachUrl = \Yii::$app->staticUrlManager->baseUrl . "/images/article/{$model->id}/";

$this->registerJs("




    (function($) {

            var getFactor = function(naturalWidth,naturalHeight) {
                    var max = 750;
                    var factor = 1;
                    var max_size = (naturalWidth > naturalHeight) ? naturalWidth : naturalHeight;

                    while(max_size > max)
                    {
                        factor++;
                        max_size = max_size / factor;
                    }

                    return factor;

            }

            var calculatePx = function(factor,naturalASize) {
                return naturalASize / factor;
            }


          $(document).ready(function() {

                     var width, height, factor, naturalWidth, naturalHeight;

                     naturalWidth = $('#imageId').get(0).naturalWidth;
                     naturalHeight = $('#imageId').get(0).naturalHeight;

                     factor = getFactor(naturalWidth, naturalHeight);

                      $('#imageId').width( calculatePx(factor,naturalWidth));
                      $('#imageId').height(calculatePx(factor,naturalHeight));

                  $( '#jCropContainer' ).on('click', 'a.tableImagejCropHref', function() {
                      var fileName = $( this ).attr('href');
                      var href = '$pachUrl' + fileName;

                      $('#imageId').attr('src', href);
                      $('#imageId').attr('data-imageName', fileName);

                       $('#hidden_default_image').val(fileName);


                        naturalWidth = $('#imageId').get(0).naturalWidth;
                        naturalHeight = $('#imageId').get(0).naturalHeight;

                        factor = getFactor(naturalWidth, naturalHeight);
                        $('#imageId').attr('data-imageFactor',  factor);
                        $('#imageId').width( calculatePx(factor,naturalWidth));
                        $('#imageId').height(calculatePx(factor,naturalHeight));

                      return false;
                });

          });
}(jQuery));", \yii\web\View::POS_READY);

?>
<div id="jCropContainer">
<div>
    <p>все подходящие ( размером больше  <?= $model::MIN_IMAGE_LENGTH; ?> px) изображения</p> </br>

    <? $model->renderListOfImage();?>

</div>
<hr>


    <div class="row">

        <div class="col-md-8">

            <?= \common\widgets\jcrop\jCrop::widget([
                // Image URL
                'url' =>  \Yii::$app->staticUrlManager->baseUrl . "/images/article/{$model->id}/".$model->default_image. '?'.rand(1,100000000),
                // options for the IMG element
                'imageOptions' => [
                    'id' => 'imageId',
                    'width' => '100%',
                    'data-imageName'=>$model->default_image,
                    'alt' => 'Crop this image'
                ],
                // Jcrop options (see Jcrop documentation [http://deepliquid.com/content/Jcrop_Manual.html])
                'jsOptions' => array(
                    'minSize' => [$model::MIN_IMAGE_LENGTH, $model::MIN_IMAGE_LENGTH],
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
                    'factor' => new yii\web\JsExpression("function() {
                                factor = $('#imageId').attr('data-imageFactor');
                                return  factor ? factor : 1;
                     }"),
                ],
            ]);
            ?>

        </div>

        <div class="col-md-4">

        </div>

    </div>


</div>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

