<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 28.11.2014
 * Time: 10:45
 */
namespace  backend\models;

use yii\helpers\Html;

class Category extends \common\models\Category
{
    /**
     * возвращает ссылку на категорию в формате {id, name}
     * @return string
     */
    public function getLink()
    {
        return Html::a($this->id.', '.$this->name,['/category/default/view','id'=>$this->id]);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}