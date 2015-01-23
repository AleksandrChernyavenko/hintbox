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

    public function setFlashError($msg = 'Ошибка. Действие не выполненно')
    {
        \Yii::$app->getSession()->setFlash('error', $msg);
    }

    public function setFlashSuccess($msg = 'Действие выполненно успешно')
    {
        \Yii::$app->getSession()->setFlash('success', $msg);
    }

    public function goBack($defaultUrl = null)
    {
        $defaultUrl = $defaultUrl ? : Yii::$app->getRequest()->referrer;
        return Yii::$app->getResponse()->redirect(Yii::$app->getUser()->getReturnUrl($defaultUrl));
    }
}
