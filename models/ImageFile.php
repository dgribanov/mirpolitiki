<?php

namespace app\models;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "image_files".
 *
 * @property int       $id
 * @property string    $description
 * @property string    $title
 * @property string    $file_name
 *
 * Virtual fields:
 * @property string    $path
 * @property array     $allImagesList
 */
class ImageFile extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'file_name', 'title'], 'required'],
            [['description', 'file_name'], 'string', 'max' => 255],
            ['title', 'string'],
            [['file_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'description'  => 'Описание',
            'title'        => 'Заголовок',
            'file_name'    => 'Имя файла',
            'path'         => 'Путь',
        ];
    }

    /**
     * @return null|string
     */
    public function getPath()
    {
        if ($this->file_name === null) {
            return null;
        }

        return Url::to('@web/img/' . $this->file_name);
    }

    /**
     * @return array
     */
    public static function getAllImagesList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'title');
    }
}
