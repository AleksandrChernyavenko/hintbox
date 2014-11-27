<?php

namespace frontend\modules\category\controllers;

use common\controllers\MainController;
use frontend\models\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * DefaultController implements the CRUD actions for Category model.
 */
class DefaultController extends MainController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $title = '')
    {
        $category = $this->findModel($id);
        if($title != $category->getSlug())
        {
            $this->redirect($category->getAbsoluteUrl());
        }

        $dataProvider = new ActiveDataProvider(
            [
                'query' => Category::find(),
                'pagination' => [
                    'pageSize' => 20,
               ],
            ]
        );

        return $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
                'model' => $category,
            ]
        );
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
