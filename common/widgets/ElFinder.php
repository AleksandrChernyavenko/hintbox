<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 28.11.2014
 * Time: 13:50
 */

namespace common\widgets;

use Yii;
use yii\helpers\ArrayHelper;

class ElFinder extends \mihaildev\elfinder\ElFinder
{

    public static function getManagerUrl($controller, $params = [])
    {

        if(is_array($controller)) {
            $params = $controller;
        }
        if(is_string($controller)) {
            $params[0] = '/'.$controller."/manager";
        }
        return Yii::$app->urlManager->createUrl($params);
    }

    public static function ckeditorOptions($controller, $options = []){
        return ArrayHelper::merge([
                'filebrowserBrowseUrl' => self::getManagerUrl($controller),
                'filebrowserImageBrowseUrl' => self::getManagerUrl($controller, ['filter'=>'image']),
                'filebrowserFlashBrowseUrl' => self::getManagerUrl($controller, ['filter'=>'flash']),
            ], $options);
    }

}