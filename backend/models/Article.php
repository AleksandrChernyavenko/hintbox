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

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['default_image'],'required'],
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
                'createdAtAttribute' => 'create',
                'updatedAtAttribute' => 'update',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function delete()
    {
        $this->status = StatusEnum::STATUS_DELETED;
        $this->save();
        return true;
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
        $this->addError($attribute, 'Файл не существует');
    }


    public function getListOfImage()
    {
        $dir = \Yii::getAlias('@static/images/article/'.$this->id.'/'); // Папка с изображениями
        $files = scandir($dir); // Берём всё содержимое директории
        $filesList = [];
        for ($i = 0; $i < count($files); $i++) { // Перебираем все файлы
            if (($files[$i] != ".") && ($files[$i] != "..")) { // Текущий каталог и родительский пропускаем
                $file = $dir.$files[$i];
                if(is_file($file) && exif_imagetype($file)) {
                    $filesList[] =  $files[$i];
                }
            }
        }


        return $filesList;

    }

    public function renderTableOfImage()
    {
        $images = $this->getListOfImage();



        $cols = 5; // Количество столбцов в будущей таблице с картинками
        echo "<table>"; // Начинаем таблицу
        $k = 0; // Вспомогательный счётчик для перехода на новые строки


        for ($i = 0; $i < count($images); $i++) { // Перебираем все файлы

                if ($k % $cols == 0) {
                    echo "<tr>"; // Добавляем новую строку
                }

                echo "<td class='tableImagejCrop'>"; // Начинаем столбец

                $path = \Yii::$app->staticUrlManager->baseUrl . "/images/article/{$this->id}/".$images[$i]; // Получаем путь к картинке
                echo "<a href='$images[$i]' class='tableImagejCropHref'>"; // Делаем ссылку на картинку
                echo "<img src='$path' alt='' width='100' />"; // Вывод превью картинки
                echo "</a>"; // Закрываем ссылку
                echo "</td>"; // Закрываем столбец
                /* Закрываем строку, если необходимое количество было выведено, либо данная итерация последняя */
                if ((($k + 1) % $cols == 0) || (($i + 1) == count($images))) echo "</tr>";
                $k++; // Увеличиваем вспомогательный счётчик
        }
        echo "</table>"; // Закрываем таблицу


    }

}