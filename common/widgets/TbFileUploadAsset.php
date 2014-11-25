<?php

namespace common\widgets;

use yii\helpers\VarDumper;

/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 14:09
 */
class TbFileUploadAsset extends \yii\web\AssetBundle
{

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAddsets('css', ['css/bootstrap-fileupload', 'css/custom-bootstrap']);
        $this->setupAddsets('js', ['js/bootstrap-fileupload']);
        parent::init();
    }

    /**
     * Set up CSS and JS asset arrays based on the base-file names
     *
     * @param string $type  whether 'css' or 'js'
     * @param array  $files the list of 'css' or 'js' basefile names
     */
    protected function setupAddsets($type, $files = [])
    {
        if (empty($this->$type)) {
            $srcFiles = [];
            $minFiles = [];
            foreach ($files as $file) {
                $srcFiles[] = "{$file}.{$type}";
                $minFiles[] = "{$file}.{$type}";
            }
            $this->$type = YII_DEBUG ? $srcFiles : $minFiles;
        }
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