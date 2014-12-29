<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 15:05
 */
namespace common\metronic\widgets;

use yii\helpers\VarDumper;
use yii\web\View;

class WidgetsAssets extends \yii\web\AssetBundle
{
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
    ];

    public $js = [
        'js/metronic.js',
        'js/layout.js',
        'js/bootstrap-hover-dropdown.min.js',
        'js/demo.js',
        'js/jquery-migrate.min.js',
        'js/jquery-ui-1.10.3.custom.min.js',
        'js/jquery.blockui.min.js',
        'js/jquery.cokie.min.js',
        'js/jquery.slimscroll.min.js',
        'js/jquery.uniform.min.js',
    ];

    public $jsOptions = [
      'position' => View::POS_HEAD,
    ];
    public $cssOptions = [
      'type' => 'text/css',
    ];

    public $css = [
        'css/components-rounded.css',
        'css/custom.css',
        'css/default.css',
        'css/fonts.css',
        'css/layout.css',
        'css/font-awesome.min.css',
        'css/simple-line-icons.min.css',
        'css/uniform.default.css',
    ];

    public $sourcePath = '@metronic/widgets/assets';



}