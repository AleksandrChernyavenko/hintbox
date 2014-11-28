<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 28.11.2014
 * Time: 13:08
 */
namespace backend\modules\category;


class ElFinderController extends \mihaildev\elfinder\Controller
{
    public function actionConnect(){
        VarDumper::dump($this->getOptions(),3,3);
        exit;
        return $this->renderFile(__DIR__."/views/connect.php", ['options'=>$this->getOptions()]);
    }


    public function actionManager(){

        $options = [
            'url'=> Url::toRoute('connect'),
            'customData' => [
                Yii::$app->request->csrfParam => Yii::$app->request->csrfToken
            ],
            'resizable' => false
        ];

        if(isset($_GET['CKEditor'])){
            $options['getFileCallback'] = new JsExpression('function(file){ '.
                'window.opener.CKEDITOR.tools.callFunction('.Json::encode($_GET['CKEditorFuncNum']).', file.url); '.
                'window.close(); }');

            $options['lang'] = $_GET['langCode'];
        }

        if(isset($_GET['filter'])){
            if(is_array($_GET['filter']))
                $options['onlyMimes'] = $_GET['filter'];
            else
                $options['onlyMimes'] = [$_GET['filter']];
        }

        if(isset($_GET['lang']))
            $options['lang'] = $_GET['lang'];

        if(isset($_GET['callback'])){
            if(isset($_GET['multiple']))
                $options['commandsOptions']['getfile']['multiple'] = true;

            $options['getFileCallback'] = new JsExpression('function(file){ '.
                'if (window!=window.top) {var parent = window.parent;}else{var parent = window.opener;}'.
                'if(parent.ElFinderFileCallback.callFunction('.Json::encode($_GET['callback']).', file))'.
                'window.close(); }');
        }

        if(!isset($options['lang']))
            $options['lang'] = Yii::$app->language;

        if(!empty($this->disabledCommands))
            $options['commands'] = new JsExpression('ElFinderGetCommands('.Json::encode($this->disabledCommands).')');


        return $this->renderFile(__DIR__."/views/manager.php", ['options'=>$options]);
    }


}