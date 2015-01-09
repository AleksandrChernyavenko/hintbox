<?php

namespace backend\models;

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
class SimilarArticle extends \common\models\SimilarArticle
{

}
