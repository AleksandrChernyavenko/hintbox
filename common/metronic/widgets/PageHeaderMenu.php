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
            <!-- BEGIN HEADER SEARCH BOX -->
                {search}
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN MEGA MENU -->
                <div class="hor-menu">
                    {menu}
                </div>
            <!-- END MEGA MENU -->
        </div>
    </div>
<!-- END HEADER MENU -->
HTML;
    public $search = '';
    public $menu = '';
    public $menu2 = '';

    public function run()
    {
        echo strtr($this->template,
            [
                '{containerClass}'=>\Yii::$app->metronic->getContainerClass(),
                '{search}'=>$this->search,
                '{menu}'=>$this->menu,
            ]
        );
    }
}