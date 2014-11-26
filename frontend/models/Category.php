<?php

namespace frontend\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $image
 * @property string $status
 */
class Category extends \common\models\Category
{
    public function getAbsoluteUrl()
    {
        return Url::to(['/category/default/view','id'=>$this->id,'title'=>$this->getSlug()]);
    }


}
