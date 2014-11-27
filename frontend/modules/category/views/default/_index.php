<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 26.11.2014
 * Time: 15:24
 */

/** @var $model \frontend\models\Category */

//\yii\helpers\VarDumper::dump($index,3,3);
//\yii\helpers\VarDumper::dump($key,3,3);
//\yii\helpers\VarDumper::dump($model,3,3);

?>

<div class="thumbnail">
    <a href="http://ru.wikihow.com/%D0%B2%D0%BE%D0%B4%D0%B8%D1%82%D1%8C-%D1%81%D0%BA%D1%83%D1%82%D0%B5%D1%80">
        <img src="<?= $model->getSrc(); ?>" alt="">

        <div class="text"><p>Как <br><span>водить скутер</span></p></div>
    </a>
</div>
