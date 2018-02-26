<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $name
 * @property int $is_deleted
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ArticleTag[] $articleTags
 */
class Tag extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return \array_merge([
            'id' => 'ID',
            'name' => 'Имя',
        ], parent::attributeLabels());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::className(), ['tag_id' => 'id'])->inverseOf('tag');
    }

    /**
     * @return array
     */
    public static function getAllTagsList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}
