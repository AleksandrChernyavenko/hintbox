<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 17:19
 */



?>


<header class="" data-section="header">

    <section class="topContainer inner-container page-header clearfix">

        <div class="container">


            <div class="masthead">

                <div class="row top_header">

                    <div class="col-md-2">
                        <!--  logo-->
                        <a href="<?= Yii::$app->getUrlManager()->baseUrl ?>" class="image logo-link">
                            <img src="<?= Yii::$app->staticUrlManager->baseUrl ?>/shared/logo.png" width="143" height="41" alt="Logo">
                        </a>
                    </div>


                    <div class="col-md-6">
                        <!-- form-search-->
                        <div class="form-search">
                            div]class="form-search"
                            форма поиска
                        </div>
                    </div>


                    <div class="col-md-4">
                        <!-- userMenu-->
                        <div id="userMenu" class="pull-right">
                            <a auth-register="" target="_self" class="register btn btn-success" href="/register">Регистрация</a>
                            <a auth-login="" target="_self" class="login btn btn-info" href="/login">Войти</a>
                        </div>

                    </div>

                </div>


                <?= \frontend\widgets\CategoryNavBar::widget([]); ?>

            </div>


        </div>


    </section>

</header>

