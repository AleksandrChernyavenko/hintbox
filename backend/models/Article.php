<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 27.11.2014
 * Time: 17:23
 */

namespace backend\models;

use yii\base\Exception;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class Article extends \common\models\Article
{

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['title','category_id'], 'required', 'on' => [self::SCENARIO_CREATE]],
            ]
        );
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Exception('NOW()'),
            ],
        ];
    }


    public function beforeSave($insert)
    {
        foreach ($this->attributes as $name=>$value) {

            if($value === '') {
                $this->$name = null;
            }
        }

        return parent::beforeSave($insert);
    }

}