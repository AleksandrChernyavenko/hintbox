<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prediction".
 *
 * @property integer $id
 * @property integer $text
 *
 */
class Prediction extends ActiveRecord
{

    const CACHE_IDS_NAME = 'PredictionIds';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prediction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'],  'string', 'length' => [4, 255]],
            [['text'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст',
        ];
    }


}
