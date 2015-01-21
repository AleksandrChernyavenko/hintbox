<?php

namespace common\widgets;

use yii\helpers\VarDumper;

/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 14:09
 */
class AjaxLoadingAsset extends \yii\web\AssetBundle
{

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public $css = [
        'Loading.css',
    ];
    public $js = [
        'Loading.js'
    ];

    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets/loading');
        parent::init();
    }

    /**
     * Sets the source path if empty
     *
     * @param string $path the path to be set
     */
    protected function setSourcePath($path)
    {
        if (empty($this->sourcePath)) {
            $this->sourcePath = $path;
        }
    }

}