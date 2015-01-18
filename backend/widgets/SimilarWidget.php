<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 17.01.2015
 * Time: 19:32
 */

namespace backend\widgets;



use common\metronic\widgets\Select2Load;
use common\models\SimilarArticle;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

class SimilarWidget extends InputWidget
{

    public $count = 4;

    public function init()
    {
        $this->registerJs();
    }

    public function run()
    {
        $html = '';
        $count = 0;
        while($count < $this->count)
        {
            $similar = !empty($this->model->similar[$count]) ? $this->model->similar[$count] : new SimilarArticle();
            $html .= $this->renderInput($similar);
            $count++;
        }

       return $html;
    }


    public function renderInput($model)
    {
        return Select2Load::widget([
            'name'=>$model->formName().'[]',
            'value'=>$model->to_id,
            'pluginOptions' => [
                'ajax' => [
                    'url' => \yii\helpers\Url::to(['/article/default/load']),
                ],
            ],
        ]);
    }


    public function registerJs()
    {

    }
}