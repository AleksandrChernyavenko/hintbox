<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 28.11.2014
 * Time: 16:35
 */
namespace frontend\widgets;

use frontend\models\Article;
use yii\base\Widget;
use yii\helpers\VarDumper;

class RelatedArticleWidget extends Widget
{
    public $model;

    public $countRelated = 8;

    public $htmlTemplate = '<div class="wrapper"><div class="row"><div class="col-md-3">{element}</div><div class="col-md-3">{element}</div><div class="col-md-3">{element}</div><div class="col-md-3">{element}</div></div><div class="row"><div class="col-md-3">{element}</div><div
        class="col-md-3">{element}</div><div class="col-md-3">{element}</div><div class="col-md-3">{element}</div></div></div>';

    public function getRelatedArticles($count)
    {
        $models = Article::find()->limit($count)->addOrderBy('RAND()')->all();

        return $models;
    }

    public function run()
    {
        $relatedModels = $this->getRelatedArticles($this->countRelated);


        $rows = [];
        foreach ($relatedModels as $model) {
            $rows[] = $this->render('_relatedArticle',[
                    'model'=>$model,
                ]);
        }

        return $this->rowToTemplate($rows);


    }

    public function rowToTemplate($rows)
    {
        $html = $this->htmlTemplate;
        while(strpos($html,'{element}'))
        {
            $element = array_shift($rows);
            $html = $this->str_replace_once('{element}', $element, $html);
        }

        return $html;


    }


    private function str_replace_once($search, $replace, $text)
    {
        $pos = strpos($text, $search);
        return $pos!==false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
    }

}