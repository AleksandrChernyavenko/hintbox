<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 14:00
 */

namespace common\metronic\widgets;

use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class PageHeaderTop extends Widget
{
    public $template = <<< HTML
<!-- BEGIN HEADER TOP-->
    <div class="page-header-top">
        <div class="{containerClass}">
            <!-- BEGIN LOGO -->
                <div class="page-logo">
                    {pageLogo}
                </div>
            <!-- END LOGO -->
                {responsiveLink}
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					   {notification}
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
                        {task}
					<!-- END TODO DROPDOWN -->
                    <li class="droddown dropdown-separator"><span class="separator"></span></li>

					<!-- BEGIN INBOX DROPDOWN -->
                        {inbox}
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
                        {dropdownUser}
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
            <!-- END TOP NAVIGATION MENU -->

        </div>
    </div>
<!-- END HEADER TOP -->
HTML;

    public $imageSrc = 'http://www.keenthemes.com/preview/metronic/theme/assets/admin/layout3/img/logo-default.png';
    public $imageOptions = [];

    public $notification;
    public $task;
    public $inbox;
    public $dropdownUser;

    public $responsiveLink = <<< HTML
<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
<!-- END RESPONSIVE MENU TOGGLER -->
HTML;



    public function run()
    {
        echo strtr($this->template,
            [
                '{containerClass}'=>\Yii::$app->metronic->getContainerClass(),
                '{pageLogo}'=>$this->getPageLogoHtml(),
                '{responsiveLink}'=>$this->responsiveLink,
                '{notification}'=>$this->notification,
                '{task}'=>$this->task,
                '{inbox}'=>$this->inbox,
                '{dropdownUser}'=>$this->dropdownUser,
            ]
        );
    }

    public function getPageLogoHtml()
    {

        return Html::a(
            Html::img($this->imageSrc,$this->imageOptions),
            Url::to('/',true)
        );

    }
}