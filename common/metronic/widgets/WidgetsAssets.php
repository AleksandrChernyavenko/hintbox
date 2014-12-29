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
    ];

    public $jsOptions = [
      'position' => View::POS_HEAD,
    ];

    public $css = [
        'css/default.css',
        'css/fonts.css',
        'css/layout.css',
    ];

    public $sourcePath = '@metronic/widgets/assets';



}