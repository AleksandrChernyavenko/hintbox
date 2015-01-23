<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 22.01.2015
 * Time: 22:04
 */

namespace frontend\models;

use yii\caching\DbDependency;
use yii\helpers\VarDumper;

class Prediction extends \common\models\Prediction
{
        public static function getRandomText()
        {
            $predictionIds = \Yii::$app->getCache()->get(self::CACHE_IDS_NAME);

            if(!$predictionIds)
            {

                $predictions = self::find()->asArray()->select(['id'])->all();
                $predictionIds = [];
                foreach($predictions as $prediction)
                {
                    $predictionIds[$prediction['id']] = $prediction['id'];
                }

                $dependency = new DbDependency();
                $dependency->sql = 'SELECT count(*) FROM '.Prediction::tableName();
                 \Yii::$app->getCache()->set(self::CACHE_IDS_NAME,$predictionIds,0,$dependency);

            }

            if(!$predictionIds) {
                return 'Prediction not found';
            }


            $id = array_rand($predictionIds);

            $model = self::findByPk($id);
            return $model->text;
        }
}