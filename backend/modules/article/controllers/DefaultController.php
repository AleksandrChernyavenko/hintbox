<?php

namespace backend\modules\article\controllers;

use Yii;
use backend\models\Article;
use yii\data\ActiveDataProvider;
use common\controllers\MainController;
use yii\helpers\FileHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $model->scenario  = Article::SCENARIO_CREATE;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        Yii::$app->getSession()->set('update_article_id',$model->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionAjaxcrop()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $articleId = Yii::$app->getRequest()->post('articleId');
        $fileName = Yii::$app->getRequest()->post('fileName');

        if(!$articleId || !$fileName)
        {
            return [
                'status'=>'error',
                'msg'=>'Не найденна картинка',
                'src'=>'',
            ];
        }

        $file = \Yii::getAlias('@static/images/article/'.$articleId.'/').$fileName;
        if(!file_exists($file))
        {
            return [
                'status'=>'error',
                'msg'=>'Не найден файл',
                'src'=>'',
            ];
        }

        $imageId_x = Yii::$app->getRequest()->post('imageId_x');
        $imageId_x2 = Yii::$app->getRequest()->post('imageId_x2');
        $imageId_y = Yii::$app->getRequest()->post('imageId_y');
        $imageId_y2 = Yii::$app->getRequest()->post('imageId_y2');
        $imageId_h = Yii::$app->getRequest()->post('imageId_h');
        $imageId_w = Yii::$app->getRequest()->post('imageId_w');


        if(is_null($imageId_x) || is_null($imageId_x2) || is_null($imageId_y) || is_null($imageId_y2) || is_null($imageId_h) || is_null($imageId_w))
        {
            return [
                'status'=>'error',
                'msg'=>'Ошибка js. Один из параметров не получен',
                'src'=>'',
            ];
        }

        if($imageId_h != $imageId_w)
        {
            return [
                'status'=>'error',
                'msg'=>'Ширина и высота не совпадают',
                'src'=>'',
            ];
        }

        /**
         * @var \yii\image\drivers\Image $image
         */
        $image = Yii::$app->image->load($file);

        $defaultname = 'prev_article_image.png';
        if($image->crop($imageId_h, $imageId_w, $imageId_x, $imageId_y)->save(\Yii::getAlias('@static/images/article/'.$articleId.'/'.$defaultname)))
        {
            return [
                'status'=>'success',
                'msg'=>"Все прошло успешно",
                'src'=>\Yii::$app->staticUrlManager->baseUrl . "/images/article/{$articleId}/".$defaultname,
                'fileName'=>$defaultname,
            ];
        }


        return [
            'status'=>'error',
            'msg'=>'Неожиданная ошибка. Попробуйте еще раз',
            'src'=>$image->crop($imageId_h, $imageId_w)->render(),
        ];
    }

    /**
     * Deletes an existing Article model.
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
}
