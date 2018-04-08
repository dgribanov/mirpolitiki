<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_articles".
 *
 * @property int $id
 * @property int $article_id
 *
 * @property Article $article
 */
class MainArticle extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id'], 'required'],
            [['article_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Основная статья',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }
}
