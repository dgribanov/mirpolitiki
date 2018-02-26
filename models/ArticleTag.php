<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles_tags".
 *
 * @property int $id
 * @property int $article_id
 * @property int $tag_id
 * @property int $is_deleted
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Article $article
 * @property Tag $tag
 */
class ArticleTag extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'tag_id'], 'required'],
            [['article_id', 'tag_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'tag_id' => 'Tag ID',
            'is_deleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id'])->inverseOf('articleTags');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id'])->inverseOf('articleTags');
    }
}
