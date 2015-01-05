<?php
namespace common\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\VarDumper;

/**
 * Site controller
 */
class MainController extends Controller
{
    public function getActionUniqueId()
    {
        return "{$this->uniqueId}/{$this->action->id}";
    }

    public function setPageTitle($title)
    {
        $view = &Yii::$app->getView();
        $view->title = $title;
    }
}
