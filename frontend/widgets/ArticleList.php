<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 26.11.2014
 * Time: 14:59
 */

namespace frontend\widgets;

use yii\helpers\VarDumper;

class ArticleList extends \yii\widgets\ListView
{

    public $layout = "{items}\n{pager}";


    public $separator = "\n";

    /**
     * Renders all data models.
     * @return string the rendering result
     */
    public function renderItems()
    {
        $models = $this->dataProvider->getModels();
        $keys = $this->dataProvider->getKeys();
        $rows = [];
        foreach (array_values($models) as $index => $model) {
            $rows[] = $this->renderItem($model, $keys[$index], $index);
        }



        $countTemplate = ceil( count($rows) / 8);


        $template = '';
        while($countTemplate)
        {
            $template .= $this->getRandomBootstrapTemplate();
            $countTemplate--;
        }



        while(strpos($template,'{element}'))
        {
            $element = array_shift($rows);
            $template = $this->str_replace_once('{element}', $element, $template);
        }
        return $template;

        return $html;
    }

    private function str_replace_once($search, $replace, $text)
    {
        $pos = strpos($text, $search);
        return $pos!==false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
    }


    /**
     * возвращает массив по которому будет генерироватся шаблон колонок
     *
     * возвращает схему 2 клетки на 4
     *
     *   ____
     *  |1234|
     *  |____|
     *
     * @return array
     */
    public function getRandomBootstrapTemplate()
    {

        $template = '<div class="row"><div class="col-md-3">{element}</div><div class="col-md-3">{element}</div><div class="col-md-3">{element}</div><div class="col-md-3">{element}</div></div><div class="row"><div class="col-md-3">{element}</div><div
        class="col-md-3">{element}</div><div class="col-md-3">{element}</div><div class="col-md-3">{element}</div></div>';

        return $template;


    }

}