<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 16:49
 */
namespace common\models;

class ActiveRecord extends \yii\db\ActiveRecord
{

    const SCENARIO_CREATE = 'create';


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


    /**
     * возвращает класс модель из backend или frontend в зависимости от того откуда вызывается relations
     * https://github.com/yiisoft/yii2/issues/2858
     * @param $className
     * @return mixed
     */
    public static function getBackendOrFrontendModelClass($className)
    {
        $calledClass = static::className();
        $nsPosition = strrpos($calledClass, '\\');
        $calledNS = substr($calledClass, 0, $nsPosition);
        return forward_static_call([$calledNS . '\\'.$className, 'className']);
    }
}