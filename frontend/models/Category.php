<?php

namespace frontend\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $image
 * @property string $status
 */
class Category extends \common\models\Category
{
    public function getAbsoluteUrl()
    {
        return Url::to(['/category/default/view','id'=>$this->id,'title'=>$this->getSlug()]);
    }

    /**
     * возвращает ссылку на категорию в формате {id, name}
     * @return string
     */
    public function getLink()
    {
        return Html::a($this->id.', '.$this->name,['/category/default/view','id'=>$this->id]);
    }

    public function getTextToPrew()
    {
        $arrayKeyWord = [
            'Как',
            'Что',
            'Почему',
            'Чем',
        ];
        $titleArray = explode(' ', $this->name);


        $first_word = array_shift($titleArray);
        $html = $first_word;
        if(in_array($first_word,$arrayKeyWord))
        {
            $html .= '<br>';
        }

        $html .= ' <span>'.implode(' ', $titleArray).'</span>';


        return $html;
    }

}
