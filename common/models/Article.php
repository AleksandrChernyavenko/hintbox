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
 * @property string $related_articles_down
 * @property string $related_articles_rigth
 * @property string $origin_url
 * @property string $status
 * @property string $default_image
 * @property string $create
 * @property string $update
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
            [['article_decs', 'content', 'related_articles_down', 'related_articles_rigth', 'status', 'default_image'], 'string'],
            [['create', 'update'], 'safe'],
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
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'article_decs' => 'Article Decs',
            'content' => 'Content',
            'related_articles_down' => 'Related Articles Down',
            'related_articles_rigth' => 'Related Articles Rigth',
            'origin_url' => 'Origin Url',
            'status' => 'Status',
            'default_image' => 'Default Image',
            'create' => 'Create',
            'update' => 'Update',
        ];
    }
}
