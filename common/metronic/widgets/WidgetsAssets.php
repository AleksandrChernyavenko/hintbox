<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 15:05
 */
namespace common\metronic\widgets;

use yii\helpers\VarDumper;

class WidgetsAssets extends \yii\web\AssetBundle
{
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
    ];

    public $js = [
        'js/layout.js',
        'js/metronic.js',
    ];

    public $css = [
        'css/default.css',
        'css/fonts.css',
        'css/layout.css',
    ];

    public $sourcePath = '@metronic/widgets/assets';



}