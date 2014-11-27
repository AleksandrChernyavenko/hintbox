<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 27.11.2014
 * Time: 17:23
 */

namespace backend\models;

use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class Article extends \common\models\Article
{

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['title','category_id'], 'required'],
            ]
        );
    }

}