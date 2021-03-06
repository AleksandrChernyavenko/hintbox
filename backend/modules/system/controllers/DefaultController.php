<?php

namespace backend\modules\system\controllers;

use backend\models\CategorySearch;
use common\controllers\MainController;
use Yii;
use common\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->setPageTitle('Категории');

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionClearAssets()
    {
        $dirBackend = Yii::getAlias('@webroot/assets/');
        $dirFrontend = Yii::getAlias('@frontend/web/assets/');

        $skip = array('.', '..','.gitignore');

        $this->clearAssets($dirBackend, $skip);
        $this->clearAssets($dirFrontend, $skip);


        $this->setFlashSuccess('Все файлы были удаленны и сгенерированны заново. Если необходимо обновите страницу используя ctrl+f5');
        $this->goBack();
    }

    private function clearAssets($dir,$skip)
    {
        $files = scandir($dir);
        foreach($files as $file) {
            if(!in_array($file, $skip))
                \yii\helpers\FileHelper::removeDirectory($dir.$file);
        }
    }

    public function actionClearCache()
    {
        Yii::$app->getCache()->flush();
        $this->setFlashSuccess();
        $this->goBack();
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->loadWithFiles(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadWithFiles(Yii::$app->request->post()) && $model->save()) {
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
