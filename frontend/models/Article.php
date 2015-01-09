<?php

namespace frontend\models;

use Yii;
use yii\helpers\Url;
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
 * @property string $create
 * @property string $update
 *
 * @property-read \common\models\Category $category
 */
class Article extends \common\models\Article
{

    public function getAbsoluteUrl()
    {
        return Url::toRoute(['/article/default/view','id'=>$this->id,'title'=>$this->getSlug()],true);
    }

}
