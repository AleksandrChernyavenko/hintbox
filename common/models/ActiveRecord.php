<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 16:49
 */
namespace common\models;

use yii\helpers\VarDumper;

class ActiveRecord extends \yii\db\ActiveRecord
{
    public function enumValidation($attribute,$params)
    {
        $columns = $this->getTableSchema()->columns;
        $column = $columns[$attribute];
        $enumValues = $column->enumValues;

        if(!in_array($this->$attribute,$enumValues))
        {
            $label = $this->getAttributeLabel($attribute);
            $this->addError($attribute, "Выбрано недопустимое значение для {$label}");
        }
    }
}