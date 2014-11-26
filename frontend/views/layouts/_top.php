<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 17:19
 */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;


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
                        <div id="userMenu">
                            <a auth-register="" target="_self" class="register" href="/register">Регистрация</a>
                            <a auth-login="" target="_self" class="login" href="https://www.ehow.com/account/login">Войти</a>
                        </div>

                    </div>

                </div>

                <ul class="nav nav-justified">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Downloads</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>


        </div>


    </section>

</header>

