<?php

namespace common\models;

use dosamigos\transliterator\TransliteratorHelper;
use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

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
 * @property string $created
 * @property string $updated
 *
 * @property-read \common\models\Category $category
 * @property-read \common\models\SimilarArticle $similar
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
            [['created', 'updated'], 'safe'],
            [['status'], 'enumValidation'],
            [['origin_url','title'], 'unique'],
            [['title', 'description', 'origin_url'], 'string', 'max' => 255]
        ];
    }

    public function getSrc()
    {
        if(!$this->default_image) {
            return 'http://placehold.it/204';
        }
        return \Yii::$app->staticUrlManager->baseUrl . "/images/article/{$this->id}/".$this->default_image;
    }

    public function getSlug()
    {
        $slug =  TransliteratorHelper::process($this->title,'','en');
        $slug =  preg_replace('/[^a-zA-Z0-9=\s—–-]+/u', '', $slug);

        return $slug;
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
            'created' => 'Дата создания',
            'updated' => 'Дата редактирования',
            'similar' => 'Связанные статьи',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(self::getBackendOrFrontendModelClass('Category'),['id'=>'category_id']);
    }

    public function getSimilar()
    {
        return $this->hasMany(\common\models\SimilarArticle::className(),['from_id'=>'id']);
    }

    public function getSimilarArticle($limit)
    {

    }

    public function getTextToPrew()
    {
        $arrayKeyWord = [
            'Как',
            'Что',
            'Почему',
            'Чем',
        ];
        $titleArray = explode(' ', $this->title);


        $first_word = array_shift($titleArray);
        $html = $first_word;
        if(in_array($first_word,$arrayKeyWord))
        {
            $html .= '<br>';
        }

        $html .= ' <span>'.implode(' ', $titleArray).'</span>';


        return $html;
    }

    public function saveWithSimilar()
    {

        if($save = $this->save())
        {

            $similarIds = Yii::$app->request->post((new SimilarArticle())->formName(),[]);
            SimilarArticle::deleteAll('from_id = :id',['id'=>$this->id]);
            foreach($similarIds as $id)
            {
                $model = new SimilarArticle();
                $model->from_id = $this->id;
                $model->to_id = $id;
                $model->save();
            }
        }

        return $save;
    }
}
