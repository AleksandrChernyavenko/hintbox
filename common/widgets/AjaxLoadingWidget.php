<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 21.01.2015
 * Time: 15:51
 */

namespace common\widgets;

use yii\base\Widget;

class AjaxLoadingWidget extends Widget {

    public function run()
    {
        AjaxLoadingAsset::register(\Yii::$app->getView());
    }

}