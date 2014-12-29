<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 13:24
 */

namespace common\metronic;

use yii\base\Component;

class Metronic extends Component
{

    const TYPE_FIXED_MEGA_MENU = 'FIXED_MEGA_MENU';
    const TYPE_FIXED_TOP_BAR = 'FIXED_TOP_BAR';
    const TYPE_TYPE_FIXED = 'TYPE_FIXED';

    public $layoutType = self::TYPE_FIXED_MEGA_MENU;

    private $layoutCssMap = [
       'bodyClass'=>[
           self::TYPE_FIXED_MEGA_MENU=>'page-header-menu-fixed',
           self::TYPE_FIXED_TOP_BAR=>'page-header-top-fixed',
           self::TYPE_TYPE_FIXED=>'page-header-fixed page-container-bg-solid page-sidebar-closed-hide-logo page-header-fixed-mobile page-footer-fixed1',
       ],
        'containerClass'=>[
           self::TYPE_FIXED_MEGA_MENU=>'container',
           self::TYPE_FIXED_TOP_BAR=>'container-fluid',
           self::TYPE_TYPE_FIXED=>'container-fluid',
       ],
    ];

    public function getBodyClass()
    {
        return $this->layoutCssMap['bodyClass'][$this->layoutType];
    }

    public function getContainerClass()
    {
        return $this->layoutCssMap['containerClass'][$this->layoutType];
    }

    public function init()
    {
        \Yii::setAlias('@metronic', __DIR__);

        \common\metronic\widgets\WidgetsAssets::register(\Yii::$app->getView());

        parent::init();
    }
}