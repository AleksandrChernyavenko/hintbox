<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.01.2015
 * Time: 20:02
 */

namespace common\controllers;

use common\models\UploadedFileModel;
use yii\helpers\VarDumper;
use yii\web\Controller;
use Yii;

class FileController extends Controller
{

    public $defaultAction = 'upload';

    public function actionUpload($id,$type)
    {
        $model = new UploadedFileModel();
        $model->owner_id = $id;
        $model->owner_type = $type;

        if($model->load(Yii::$app->request->post()) && $model->save()){

        }
        VarDumper::dump($model->load(Yii::$app->request->post()),3,3);
        VarDumper::dump($model->getErrors(),3,3);
        exit;

        return json_encode($model->getErrors());




    }

    public function upload()
    {

    }

    public function findModel($id)
    {

    }
}