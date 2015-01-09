<?php

namespace common\models;

use common\enums\StatusEnum;
use dosamigos\transliterator\TransliteratorHelper;
use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "similar_article".
 *
 * @property integer $id
 * @property integer $from_id
 * @property integer $to_id
 *
 */
class SimilarArticle extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'similar_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_id', 'to_id'], 'required'],
            [['from_id', 'to_id'], 'integer'],
            [['to_id'], 'unique', 'targetAttribute' => ['from_id', 'to_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_id' => 'Статья',
            'to_id' => 'Похожа на',
        ];
    }


}
