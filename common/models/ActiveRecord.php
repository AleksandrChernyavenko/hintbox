<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 16:49
 */
namespace common\models;

use common\enums\StatusEnum;
use yii\base\InvalidConfigException;
use yii\helpers\VarDumper;

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

    public static function getEnumClientValues($column_name)
    {
        $columns = self::getTableSchema()->columns;
        $column = $columns[$column_name];
        $enumValues = $column->enumValues;

        $items = [];
        foreach ($enumValues as $value) {
            $items[$value] = StatusEnum::getClientValue($value);
        }

        return $items;



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


    /**
     * @inheritdoc
     * @return \yii\db\ActiveQuery the newly created [[ActiveQuery]] instance.
     */
    public static function findActive()
    {
        return parent::find()->andWhere('status = :status',[':status'=>StatusEnum::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     * @return $this the newly created [[ActiveQuery]] instance.
     */
    public static function findByPk($pk)
    {
        $primaryKey = static::primaryKey();
        if (isset($primaryKey[0])) {
            return static::find()->andWhere([$primaryKey[0] => $pk])->one();
        } else {
            throw new InvalidConfigException(get_called_class() . ' must have a primary key.');
        }
    }
}