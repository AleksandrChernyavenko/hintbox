<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 17:20
 */


?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Как сделать все что пожелаете: <br> на сайте <?= Yii::$app->params['siteName'] ?></h4>
                &copy; 2014 -  <?= date('Y') ?>.
                При копировании материалов ссылка на данный сайт обязательна
                <br>
                <?= $this->render('_metrica'); ?>



            </div>
            <div class="col-md-8">
                <h4>
                    Популярные категории
                </h4>

                <ul class="list-inline pull-right">
                    <?
                    foreach (\frontend\models\Category::find()->all() as $category) {
                        echo \yii\helpers\Html::tag('li',\yii\helpers\Html::a($category->name,$category->getAbsoluteUrl(), ['target'=>'_blank']));
                    }
                    ?>
                </ul>
            </div>
        </div>
        <p class="pull-left"></p>
        <p class="pull-right"></p>
    </div>
</footer>