<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $article_decs
 * @property string $content
 * @property string $origin_url
 * @property string $status
 * @property string $default_image
 * @property string $create
 * @property string $update
 *
 * @property-read \common\models\Category $category
 */
class Article extends \common\models\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['article_decs', 'content', 'status', 'default_image'], 'string'],
            [['create', 'update'], 'safe'],
            [['status'], 'enumValidation'],
            [['title', 'description', 'origin_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'title' => 'Заголовок',
            'description' => 'Краткое описание для поисковиков',
            'article_decs' => 'Краткое описание',
            'content' => 'Содержание',
            'origin_url' => 'Url оригинала',
            'status' => 'Статус',
            'default_image' => 'Картинка по умолчанию',
            'create' => 'Дата создания',
            'update' => 'Дата редактирования',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(self::getBackendOrFrontendModelClass('Category'),['id'=>'category_id']);
    }
}