<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 23.01.2015
 * Time: 11:31
 */

namespace common\widgets;

use frontend\models\Prediction;
use yii\base\Widget;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Cookie;

class PredictionWidget extends Widget
{

    private $modalId = 'predictionModalId';

    public $cookieId = 'prediction';

    public $textClose = 'Приветики! </br> </br> Я волшебный сундук с советами и предсказаниями. </br>Если хочешь узнать свое будущее или получить от меня советик, то на каждой третьей странице этого сайта ты сможешь меня снова открыть и извлечь тайны будущего.</br></br> Удачки!';

    public $options = [];

    private $closeImg = '/img/box_close.png';
    private $pressMeImg = '/img/press_me.png';
    private $openImg= '/img/box_open.png';

    public function init()
    {

    }

    public function run()
    {
        if($this->canUserOpen()) {
            $this->incCountView();
            return $this->renderBoxCanOpen();
        }
        else {
            $this->incCountView();
            return $this->renderBoxClosed();
        }
    }

    private function getCountView()
    {
        $cookie = \Yii::$app->getRequest()->cookies[$this->cookieId];
        return $cookie ? $cookie->value : 0;
    }

    protected function incCountView()
    {
        $count = $this->getCountView();
        \Yii::$app->getResponse()->getCookies()->add( new Cookie(
            [
                'name'=>$this->cookieId,
                'value'=>++$count,
            ]
        ));
    }

    private function canUserOpen()
    {
        $countView = $this->getCountView();
        return $countView && ($countView % 3) === 0;
    }

    private function getBundle()
    {
        return $this->registerAsset();
    }

    private function registerAsset()
    {
        return PredictionAsset::register(\Yii::$app->getView());
    }

    private function renderBoxClosed()
    {
        $bundle = $this->getBundle();
        $src = $bundle->baseUrl.$this->closeImg;

        $modal = $this->renderModal($this->textClose);
        return $modal . Html::img($src,$this->getOptions(['style'=>"height: 140px;"])).Html::img($bundle->baseUrl.$this->pressMeImg,$this->getOptions(['style'=>"width: 159px;",'id'=>'press_me']));
    }

    private function renderBoxCanOpen()
    {
        $bundle = $this->getBundle();
        $src = $bundle->baseUrl.$this->openImg;

        $modal = $this->renderModal($this->getPrediction());

        return $modal . Html::img($src,$this->getOptions());
    }

    private function getPrediction()
    {
        return Prediction::getRandomText();
    }

    private  function renderModal($text)
    {
        return  Modal::widget(
            [
                'header' => "<h4>$text</h4>",
                'options' => ['id'=>$this->modalId],
            ]
        );
    }


    private function getOptions($options = [])
    {
        $this->options = array_merge($this->options,$options);

        if(empty($this->options['style'])) {
            $this->options['style'] = 'height: 169px';
        }
        if(empty($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if(empty($this->options['onclick'])) {
            $this->options['onclick'] = "$('#{$this->modalId}').modal('show')";
        }
        return $this->options;
    }
}