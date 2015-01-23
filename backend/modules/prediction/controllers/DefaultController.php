<?php

namespace backend\modules\prediction\controllers;

use backend\models\PredicationSearch;
use common\controllers\MainController;
use Yii;
use common\models\Prediction;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Prediction model.
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PredicationSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->setPageTitle('Предсказания');

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Prediction();

        $post = Yii::$app->request->post($model->formName());
        if($post)
        {
            $models = [];
            $saveAll = true;
            foreach($post as $data) {
                $model = new Prediction();
                $model->setAttributes($data);
                $models[] = $model;
                if(!$model->validate()) {
                    $saveAll = false;
                }
            }

            if(!$saveAll)
            {
                $this->setFlashError();
                return $this->render('create', [
                    'models' => $models,
                ]);
            }
            else {

                foreach($models as $model) {
                    $model->save(false);
                }
                $this->setFlashSuccess('Все данные успешно добавленны');
                return $this->redirect(['index']);
            }
        }
        else {
            return $this->render('create', [
                'models' => [$model],
            ]);
        }
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prediction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prediction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
