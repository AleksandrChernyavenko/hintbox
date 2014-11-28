<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 28.11.2014
 * Time: 13:08
 */
namespace backend\modules\article\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller as BaseController;
use yii\web\JsExpression;

class ElfinderController extends \mihaildev\elfinder\Controller
{

    public $roots = [
        'article_update' => [
            'baseUrl'=>'@static',
            'basePath'=>'@static/article',
            'path' => 'images/{update_article_id}',
            'name' => 'Текущая категория'
        ]
    ];

    private $_options;

    public function getOptions()
    {
        if($this->_options !== null)
            return $this->_options;

        $this->_options['roots'] = [];

        $update_article_id = Yii::$app->getSession()->get('update_article_id');
        $article_id_getParam = Yii::$app->request->get('article_id', Yii::$app->request->post('article_id'));




        if(!(int)$update_article_id || !(int)$article_id_getParam)
        {
            return $this->_options;
        }
        else
        {
            if( (int)$update_article_id != (int)$article_id_getParam)
            {
                return $this->_options;
            }

            $this->roots['article_update']['path'] = strtr(
                $this->roots['article_update']['path'],
                [
                    '{update_article_id}'=>$update_article_id,
                ]
            );
        }


        foreach($this->roots as $root){
            if(is_string($root))
                $root = ['path' => $root];

            if(!isset($root['class']))
                $root['class'] = 'mihaildev\elfinder\LocalPath';

            $root = Yii::createObject($root);

            /** @var \mihaildev\elfinder\LocalPath $root*/

            if($root->isAvailable())
                $this->_options['roots'][] = $root->getRoot();
        }

        return $this->_options;
    }

    public function actionManager(){

        $options = [
            'url'=> Url::toRoute('connect'),
            'customData' => [
                Yii::$app->request->csrfParam => Yii::$app->request->csrfToken,
                'article_id'=>  Yii::$app->request->get('article_id', Yii::$app->request->post('article_id')),
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


        return $this->renderFile(parent::getDIR()."/views/manager.php", ['options'=>$options]);
    }


}