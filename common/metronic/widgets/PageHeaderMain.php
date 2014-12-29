<?php

namespace common\metronic\widgets;

use yii\base\Widget;

/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 14:09
 */
class PageHeaderMain extends Widget
{
    //http://www.keenthemes.com/preview/metronic/theme/templates/admin3/layout_mega_menu_fixed.html
    public $template = <<< HTML
<!-- BEGIN HEADER -->
    <div class="page-header">
        {headerTop}
        {headerMenu}
    </div>
<!-- END HEADER -->
HTML;
    public $headerTop = '';
    public $headerMenu = '';

    public function run()
    {
        echo strtr($this->template,
            [
               '{headerTop}'=>$this->headerTop,
               '{headerMenu}'=>$this->headerMenu,
            ]
        );

        \Yii::$app->getView()->registerJs('jQuery(document).ready(function() {
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
$(".dropdown-toggle").dropdownHover();
});');
    }

}