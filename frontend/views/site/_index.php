<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 26.11.2014
 * Time: 15:24
 */

/** @var $model \frontend\models\Article */

//\yii\helpers\VarDumper::dump($index,3,3);
//\yii\helpers\VarDumper::dump($key,3,3);
//\yii\helpers\VarDumper::dump($model,3,3);

?>

<div class="thumbnail">
    <a href="<?= $model->getAbsoluteUrl(); ?>">
        <img src="<?= $model->getSrc(); ?>" alt="">

<!--        <div class="text"><p>Как <br><span>водить скутер</span></p></div>-->
        <div class="text"><p><?= $model->getTextToPrew(); ?></p></div>
    </a>
</div>
