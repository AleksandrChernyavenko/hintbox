<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 14:00
 */

namespace common\metronic\widgets;

use yii\base\Widget;

class PageHeaderMenu extends Widget
{
    public $template = <<< HTML
<!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
         <div class="{containerClass}">
            {content}
        </div>
    </div>
<!-- END HEADER MENU -->
HTML;
    public $headerTop = '';

    public function run()
    {
        echo strtr($this->template,
            [
                '{content}'=>$this->headerTop,
                '{containerClass}'=>\Yii::$app->metronic->getContainerClass(),
            ]
        );
    }
}