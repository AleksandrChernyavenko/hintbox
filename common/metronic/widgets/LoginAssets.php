<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 31.12.2014
 * Time: 16:25
 */

namespace common\metronic\widgets;

class LoginAssets extends WidgetsAssets
{
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $js = [
    ];

    public $jsOptions = [
    ];
    public $cssOptions = [
    ];

    public $css = [
        'css/login.css',
    ];

    public $sourcePath = '@metronic/widgets/assets';
}