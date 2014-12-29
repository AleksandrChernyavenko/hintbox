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

class PageHeaderTop extends Widget
{
    public $template = <<< HTML
<!-- BEGIN HEADER TOP-->
    <div class="page-header-top">
        <div class="{containerClass}">
            <div class="page-logo">
                <!-- BEGIN LOGO -->
                {pageLogo}
                <!-- END LOGO -->
                {responsiveLink}
            </div>
        </div>
    </div>
<!-- END HEADER TOP -->
HTML;

    public $imageSrc = 'http://www.keenthemes.com/preview/metronic/theme/assets/admin/layout3/img/logo-default.png';
    public $imageOptions = [];

    private $responsiveLink = <<< HTML
<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
<!-- END RESPONSIVE MENU TOGGLER -->
HTML;



    public function run()
    {
        echo strtr($this->template,
            [
                '{pageLogo}'=>$this->getPageLogoHtml(),
                '{responsiveLink}'=>$this->responsiveLink,
                '{containerClass}'=>\Yii::$app->metronic->getContainerClass(),
            ]
        );
    }

    public function getPageLogoHtml()
    {

        return Html::a(
            Html::img($this->imageSrc,$this->imageOptions),
            \Yii::$app->request->baseUrl
        );

    }
}