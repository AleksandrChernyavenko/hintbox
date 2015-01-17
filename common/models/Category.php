<?php

namespace common\models;

use common\enums\StatusEnum;
use dosamigos\transliterator\TransliteratorHelper;
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
 * @property string $created
 * @property string $updated
 *
 * @property-read \common\models\Category $parent
 */
class Category extends ActiveRecord
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
            [['parent_id', 'name', 'status'], 'required'],
            [['parent_id'], 'integer'],
            [['image', 'status'], 'string'],
            [['status'], 'enumValidation'],
            [['name'], 'string', 'max' => 255],
            [['created', 'updated'], 'safe'],
            [['image'], 'file', 'extensions' => 'jpg, gif, png','skipOnEmpty'=>false],
        ];
    }

    public function behaviors() {
        return [
            'image' => [
                'class' => \claudejanz\fileBehavior\FileBehavior::className(),
                'paths' => '@static/category/images/{id}/',
                'fileNameAttributes' => ['image'],
            ],
        ];
    }

    public function getTextWithImage()
    {
        return Html::img($this->getSrc(), ['style'=>'height: 25px;width:25px']).' '.$this->getIdName();
    }

    public function getSrc()
    {
        if(!$this->image) {
            return 'http://placehold.it/300';
        }

        return strtr(
            $this->image,
            ['@static'=> \Yii::$app->staticUrlManager->baseUrl]
        );
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
            'created' => 'Дата создания',
            'updated' => 'Дата редактирования',
        ];
    }

    public function getIdName()
    {
        return $this->id.', '.$this->name;
    }

    public function getSlug()
    {
           return TransliteratorHelper::process($this->name,'','en');
    }


    /**
     * @return \common\models\Category
     */
    public function getParent()
    {
        return $this->hasOne(self::getBackendOrFrontendModelClass('Category'),['id'=>'parent_id']);
    }


    public function delete()
    {
        $this->status = StatusEnum::STATUS_DELETED;
        return $this->save();
    }
}
