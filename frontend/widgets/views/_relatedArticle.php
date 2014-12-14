<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 28.11.2014
 * Time: 16:41
 * @var $model \frontend\models\Article
 */

$imageClass = [
    'img-rounded'=>'img-rounded',
    'img-rounded'=>'img-rounded',
    'img-rounded'=>'img-rounded',
    'img-rounded'=>'img-rounded',
    'img-rounded'=>'img-rounded',
    'img-rounded'=>'img-rounded',

    'img-circle'=>'img-circle',
]

?>
<div class="thumbnail related-thumbnail">


    <a href="<?= $model->getAbsoluteUrl(); ?>">
        <img src="<?= $model->getSrc(); ?>" alt="" class="img-rounded"  >
        <div class="text">
            <p>
                <?= $model->getTextToPrew() ?>
            </p>
        </div>
    </a>
</div>
