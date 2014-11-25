<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $image
 * @property string $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'name'], 'required'],
            [['parent_id'], 'integer'],
            [['image', 'status'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'jpg, gif, png'],
        ];
    }

    public function behaviors() {
        return [
            'image' => [
                'class' => \claudejanz\fileBehavior\FileBehavior::className(),
                'paths' => '@static/category/images/{id}/',
            ],
        ];
    }

    public function getTextWithImage()
    {
        return Html::img($this->getSrc()).' '.$this->name;
    }

    public function getSrc()
    {
        return \Yii::$app->urlManager->baseUrl . '/' .  $this->image;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'name' => 'Название категории',
            'image' => 'Картинка',
            'status' => 'Статус',
        ];
    }
}
