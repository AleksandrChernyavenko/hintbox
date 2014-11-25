<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 13:38
 */

namespace common\widgets;
use yii\helpers\Html;
use yii\helpers\VarDumper;


class TbFileUpload extends BaseForm
{
    public $defaultValue;
    public $basePathLogo;
    public $object;
    public $showThumbnail;
    public $label;

    public function init()
    {
        VarDumper::dump($this,3,3);
        exit;
//        Yii::app()->clientScript->registerPackage('file-upload');
//        Yii::app()->clientScript->registerScript('form-components', "
//			if (jQuery().datepicker) {
//                $('.date-picker').datepicker({format:'dd.mm.yyyy', });
//            }
//		", \CClientScript::POS_READY);
    }

    public function run()
    {
        $this->render('fileupload', [
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
}