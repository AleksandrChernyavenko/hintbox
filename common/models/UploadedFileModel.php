<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.01.2015
 * Time: 19:12
 */

namespace common\models;
use common\enums\StatusEnum;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "uploaded_file".
 *
 * @property integer $id
 * @property integer $owner_id
 * @property string $owner_type
 * @property string $name
 * @property string $filename
 * @property string $path
 * @property string $size
 * @property string $file_type
 * @property string $created
 *
 */

class UploadedFileModel extends ActiveRecord
{
    /**
     * @var UploadedFiles
     */
    public $file;

    /**
     * @var string Upload path
     */
    public $uploadPath = '@runtime/upload';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uploaded_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'filename','size', 'file_type', 'path'], 'required'],
            [['id','owner_id'], 'integer'],
            [['owner_type', 'name', 'filename', 'size', 'file_type'], 'string'],
            [['owner_type'], 'enumValidation'],
            [['name'], 'string', 'max' => 255],
            [['created'], 'safe'],
            [['file'], 'file'],
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inherited
     */
    public function beforeSave($insert)
    {
        if ($this->file && $this->file instanceof UploadedFile && parent::beforeSave($insert)) {

            $filePath = '';
            if(is_callable($this->uploadPath))
            {
                FileHelper::createDirectory($this->uploadPath($this));
            }
            else {
                FileHelper::createDirectory(dirname($this->filename));
            }


            return $this->file->saveAs($this->filename, false);
        }
        return false;
    }
    /**
     * @inherited
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            return unlink($this->filename);
        }
        return false;
    }
    /**
     * Save file
     * @param UploadedFile $file
     * @param string $path
     * @return boolean|static
     */
    public static function saveAs($file, $path = '@runtime/upload', $directoryLevel = 1)
    {
        $model = new static([
            'file' => $file,
            'uploadPath' => $path,
            'directoryLevel' => $directoryLevel,
        ]);
        return $model->save() ? $model : false;
    }



}