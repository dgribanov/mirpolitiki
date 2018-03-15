<?php

namespace app\models;

use yii\base\Model;
use app\models\ImageFile;
use yii\web\UploadedFile;


/**
 * Class UploadImageForm
 * @package app\models
 *
 *
 * @var $imageFile UploadedFile
 * @var $image ImageFile
 * @var $title string
 * @var $description string
 */
class UploadImageForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @var ImageFile
     */
    public $image;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    private $imagesDirPath;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'title'], 'required'],
            [['description'], 'string', 'max' => 255],
            ['title', 'string'],
            [
                'imageFile',
                'file',
                'extensions'    => 'gif, jpg, jpeg, png, tif, tiff, ico, jng, bmp, svg, svgz',
                'checkExtensionByMimeType' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title'        => 'Заголовок файла',
            'description'  => 'Описание файла',
            'imageFile'    => 'Загрузка файла',
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->imagesDirPath = \Yii::getAlias('@web');
    }

    /**
     * @param $image ImageFile
     * @return bool
     */
    public function upload(ImageFile $image)
    {
        $this->image = $image;
        $originalFileName = $this->imageFile->baseName . '.' . $this->imageFile->extension;

        if ($this->validate()) {
            $this->image->description = $this->description;
            $this->image->title = $this->title;
            $this->image->file_name = $this->generateFilename();

            if ($this->image->save()) {
                if ($this->imageFile->saveAs($this->imagesDirPath . $this->image->file_name)) {
                    return true;
                } else {
                    $this->addError('imageFile', \sprintf('Произошла ошибка при заливке файла %s', $originalFileName));
                }
            } else {
                $this->addError('imageFile', \sprintf('Произошла ошибка при сохранении данных файла %s', $originalFileName));
            }
        }

        return false;
    }

    /**
     * @return string
     */
    public function generateFilename()
    {
        if (! $this->imageFile instanceof UploadedFile) {
            throw new \RuntimeException('File field of MediaFile must be instance of UploadedFile');
        }

        return ImageFile::BASE_IMG_PATH . \md5(\microtime(true)) . '.' . \strtolower($this->imageFile->extension);
    }
}