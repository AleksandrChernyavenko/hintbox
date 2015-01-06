<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 27.11.2014
 * Time: 17:23
 */

namespace backend\models;

use common\enums\StatusEnum;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;

class Article extends \common\models\Article
{

    const MIN_IMAGE_LENGTH = 204;

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['default_image'],'prevImageValidate'],
                [['title','category_id'], 'required', 'on' => [self::SCENARIO_CREATE]],
            ]
        );
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function delete()
    {
        $this->status = StatusEnum::STATUS_DELETED;
        return  $this->save();
    }


    public function beforeSave($insert)
    {
        foreach ($this->attributes as $name=>$value) {

            if($value === '') {
                $this->$name = null;
            }
        }

        return parent::beforeSave($insert);
    }

    public function prevImageValidate($attribute,$params)
    {
        if(!$this->$attribute)
        {
            $this->addError($attribute, 'Пустое поле');
        }
        elseif(!file_exists( \Yii::getAlias('@static/images/article/'.$this->id.'/'.$this->$attribute))) {
            $this->addError($attribute, 'Файл не существует');
        }
        else {
            $imageSize = getimagesize( \Yii::getAlias('@static/images/article/'.$this->id.'/'.$this->$attribute));
            if($imageSize[0] != $imageSize[1]) {
                 $this->addError($attribute, 'Картинка предпросмотра имеет разную высоту и ширину');
            }
        }
    }


    public function getListOfImage()
    {
        $dir = \Yii::getAlias('@static/images/article/'.$this->id.'/'); // Папка с изображениями
        FileHelper::createDirectory($dir);
        $files = scandir($dir); // Берём всё содержимое директории
        $filesList = [];
        for ($i = 0; $i < count($files); $i++) { // Перебираем все файлы
            if (($files[$i] != ".") && ($files[$i] != "..")) { // Текущий каталог и родительский пропускаем
                $file = $dir.$files[$i];
                if(is_file($file) && exif_imagetype($file)) {
                    $imageSize = getimagesize( $dir.$files[$i]);
                    if($imageSize[0] > self::MIN_IMAGE_LENGTH && $imageSize[1] > self::MIN_IMAGE_LENGTH) {
                        $filesList[] =  $files[$i];
                    }
                }
            }
        }


        return $filesList;

    }

    public function renderListOfImage()
    {
        $images = $this->getListOfImage();
        for ($i = 0; $i < count($images); $i++) { // Перебираем все файлы

            echo "<span class='tableImagejCrop'>"; // Начинаем столбец

            $path = \Yii::$app->staticUrlManager->baseUrl . "/images/article/{$this->id}/".$images[$i]; // Получаем путь к картинке
            echo "<a href='$images[$i]' class='tableImagejCropHref'>"; // Делаем ссылку на картинку
            echo "<img src='$path' alt='' width='100px' />"; // Вывод превью картинки
            echo "</a>"; // Закрываем ссылку
            echo "</span>"; // Закрываем столбец
        }
    }

}