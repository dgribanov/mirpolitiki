<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * Article model
 *
 * @property integer    $id
 * @property string     $text
 * @property string     $title
 * @property string     $description
 * @property integer    $header_image_id
 * @property integer    $type
 *
 * Relations:
 * @property ImageFile         $headerImage
 * @property ArticleTag[]      $articleTags
 * @property Tag[]             $tags
 *
 * Virtual fields:
 * @property array      $tagsList
 * @property string     $createdAt
 */
class Article extends BaseModel
{
    const TYPE_POLITICS   = 1;
    const TYPE_ECONOMICS  = 2;
    const TYPE_SOCIETY    = 3;
    const TYPE_EVENTS     = 4;
    const TYPE_HISTORY    = 5;
    const TYPE_VIDEO      = 6;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'title', 'description', 'header_image_id', 'type'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return \array_merge([
            'id'               => 'ID',
            'text'             => 'Текст',
            'title'            => 'Заголовок',
            'type'             => 'Раздел',
            'description'      => 'Описание',
            'created_at'       => 'Создана',
            'updated_at'       => 'Изменена',
            'is_deleted'       => 'Удалена',
            'header_image_id'  => 'Титульное изображение',
            'tagsList'         => 'Теги',
        ], parent::attributeLabels());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeaderImage()
    {
        return $this->hasOne(ImageFile::class, ['id' => 'header_image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::class, ['article_id' => 'id'])->inverseOf('article');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('articleTags');
    }

    /**
     * @return array
     */
    public function getTagsList()
    {
        return ArrayHelper::getColumn($this->tags, 'id');
    }

    public function getCreatedAt()
    {
        return \Yii::$app->formatter->asDate($this->created_at);
    }

    public function getUpdatedAt()
    {
        return \Yii::$app->formatter->asDate($this->updated_at);
    }

    public static function getTypes() {
        return [
            Article::TYPE_POLITICS,
            Article::TYPE_ECONOMICS,
            Article::TYPE_SOCIETY,
            Article::TYPE_EVENTS,
            Article::TYPE_HISTORY,
            Article::TYPE_VIDEO,
        ];
    }

    public static function getTypesList() {
        return [
            Article::TYPE_POLITICS    => 'Политика',
            Article::TYPE_ECONOMICS   => 'Экономика',
            Article::TYPE_SOCIETY     => 'Общество',
            Article::TYPE_EVENTS      => 'События',
            Article::TYPE_HISTORY     => 'История и культура',
            Article::TYPE_VIDEO       => 'Видео',
        ];
    }
}