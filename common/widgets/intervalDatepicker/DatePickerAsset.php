<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 24.12.2014
 * Time: 12:25
 */

namespace common\widgets\intervalDatepicker;

class DatePickerAsset extends  \kartik\base\AssetBundle
{
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/daterangepicker', 'css/daterangepicker_costom']);
        $this->setupAssets('js', ['js/mustache', 'js/moment', 'js/ru','js/daterangepicker.leads']);
        parent::init();
    }
}