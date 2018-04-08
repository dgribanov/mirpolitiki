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
 * @property string     $url
 *
 * Relations:
 * @property ImageFile         $headerImage
 * @property ArticleTag[]      $articleTags
 * @property Tag[]             $tags
 *
 * Virtual fields:
 * @property array      $tagsList
 * @property string     $typeString
 * @property string     $createdAt
 */
class Article extends BaseModel
{
    const TYPE_EMPTY      = 0;
    const TYPE_POLITICS   = 1;
    const TYPE_ECONOMICS  = 2;
    const TYPE_SOCIETY    = 3;
    const TYPE_EVENTS     = 4;
    const TYPE_HISTORY    = 5;
    const TYPE_VIDEO      = 6;
    const TYPE_ENGLISH    = 7;

    private $_tagsList;

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
            [
                [
                    'text',
                    'title',
                    'description',
                    'header_image_id',
                    'type',
                    'url',
                ],
                'required'
            ],
            [
                'url',
                'match',
                'pattern' => '/^[a-z0-9-_]{5,120}.html$/i',
                'when' => function(Article $model) {
                    return (int)$model->type !== Article::TYPE_EMPTY;
                }
            ],
            /*['url', 'filter', 'filter' => function ($value) {
                // normalize phone input here
                return $value . '.html';
            }],*/
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
        return $this->hasOne(ImageFile::className(), ['id' => 'header_image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::className(), ['article_id' => 'id'])->inverseOf('article');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->via('articleTags');
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

    public static function getTypeStringsList()
    {
        return [
            Article::TYPE_POLITICS   => 'politika',
            Article::TYPE_ECONOMICS  => 'ekonomika',
            Article::TYPE_SOCIETY    => 'obschestvo',
            Article::TYPE_EVENTS     => 'sobytija',
            Article::TYPE_HISTORY    => 'istorija_kultura',
            Article::TYPE_VIDEO      => 'video',
            Article::TYPE_ENGLISH    => 'eng',
        ];
    }

    public function getTypeString()
    {
        return Article::getTypeStringsList()[$this->type];
    }

    public static function getTypes() {
        return [
            Article::TYPE_EMPTY,
            Article::TYPE_POLITICS,
            Article::TYPE_ECONOMICS,
            Article::TYPE_SOCIETY,
            Article::TYPE_EVENTS,
            Article::TYPE_HISTORY,
            Article::TYPE_VIDEO,
            Article::TYPE_ENGLISH,
        ];
    }

    public static function getTypesList() {
        return [
            Article::TYPE_EMPTY       => 'Без раздела',
            Article::TYPE_POLITICS    => 'Политика',
            Article::TYPE_ECONOMICS   => 'Экономика',
            Article::TYPE_SOCIETY     => 'Общество',
            Article::TYPE_EVENTS      => 'События',
            Article::TYPE_HISTORY     => 'История и культура',
            Article::TYPE_VIDEO       => 'Видео',
            Article::TYPE_ENGLISH     => 'Eng',
        ];
    }

    public static function getTypePublicName($type) {
        return self::getTypesList()[$type];
    }

    public static function getTypeInnerName($type) {
        return self::getTypeStringsList()[$type];
    }

    /**
     * @return array
     */
    public static function getAllArticlesList()
    {
        return ArrayHelper::map(self::find()->orderBy(['created_at' => SORT_DESC])->all(), 'id', 'title');
    }
}