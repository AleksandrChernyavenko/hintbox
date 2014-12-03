<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 26.11.2014
 * Time: 15:24
 */

/** @var $model \frontend\models\Article */


?>

<div class="thumbnail">
    <a href="<?= $model->getAbsoluteUrl(); ?>">
        <img src="<?= $model->getSrc(); ?>" alt="" class="main_page_category_list">

        <div class="text"><p><?= $model->getTextToPrew(); ?></p></div>
    </a>
</div>
