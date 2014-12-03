<?php

namespace frontend\modules\article\controllers;

use Yii;
use frontend\models\Article;
use yii\data\ActiveDataProvider;
use common\controllers\MainController;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Article model.
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$title = '')
    {
        $model = $this->findModel($id);

        if($title != $model->getSlug())
        {
            $this->redirect($model->getAbsoluteUrl());
        }

        $this->setMetadata($model);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function setMetadata($model)
    {
        /**
         * @var $model \frontend\models\Article
         * @var $category \frontend\models\Category
         */
        $category = $model->category;

        $view = Yii::$app->getView();
        $breadcrumbs = &$view->params['breadcrumbs'];

        if($category)
        {

            //добавляем родительские категории
            while($parentCategory = $category->parent)
            {
                $breadcrumbs[] = [
                    'label'=>$category->name,
                    'url'=>$category->getAbsoluteUrl(),
                ];
            }

            //добавляем тукущую категорию
            $breadcrumbs[] = [
                'label'=>$category->name,
                'url'=>$category->getAbsoluteUrl(),
            ];
        }

        $breadcrumbs[] = $model->title;


        //pageTitle
        $view->title = $model->title . ' | '.Yii::$app->params['siteName'];
        $view->registerMetaTag([
                'description'=>$model->description,
            ]);
    }
}
