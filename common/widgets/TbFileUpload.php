<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 13:38
 */

namespace common\widgets;
use yii\helpers\Html;


class TbFileUpload extends BaseForm
{
    public $defaultValue;
    public $basePathLogo;
    public $object;
    public $showThumbnail;
    public $label;

    public function init()
    {
        $this->registerAssets();
    }

    public function run()
    {

        echo $this->render('fileupload', [
                'labelBtn' => $this->label,
                'label' => $this->model->getAttributeLabel($this->attribute),
                'fileField' => Html::activeFileInput($this->model, $this->attribute),
                'showThumbnail' => $this->showThumbnail,
                'model' =>$this->model,
                'attribute' =>$this->attribute,
                'basePathLogo' => $this->basePathLogo,
            ]
        );
    }

    public function registerAssets()
    {
        $view = $this->getView();


        TbFileUploadAsset::register($view);
    }


}