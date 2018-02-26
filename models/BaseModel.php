<?php

namespace app\models;

use DateTime;
use LogicException;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;
use yii\db\ActiveQueryInterface;


/**
 * This is the model class all models with safe delete behaviour.
 *
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * @property boolean $is_deleted
 */
class BaseModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'created_at'    => 'Создан',
            'updated_at'    => 'Изменен',
            'is_deleted'    => 'Удалён',
        ];
    }

    /**
     * We use table prefix for preventing is_deleted choose db error on joining safe deleted models
     *
     * @return ActiveQueryInterface
     */
    public static function find()
    {
        return parent::find()->where([
            static::tableName() . '.is_deleted' => false,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'softDeleteBehavior' => [
                'class' => SoftDeleteBehavior::class,
                'softDeleteAttributeValues' => [
                    'is_deleted' => true
                ],
            ],
            'timestampBehavior' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ActiveRecord::EVENT_BEFORE_DELETE => ['updated_at'],
                    SoftDeleteBehavior::EVENT_BEFORE_RESTORE => ['updated_at'],
                ],
                'value' => (new DateTime())->format('c'),
            ],
        ];
    }

    /**
     * This method is invoked before soft deleting a record.
     * The default implementation raises the [[EVENT_BEFORE_SOFT_DELETE]] event.
     * @return bool whether the record should be deleted. Defaults to true.
     */
    public function beforeSoftDelete()
    {
        foreach ($this->getDirtyAttributes() as $name => $value) {
            if (is_array($value)) {
                $this->setOldAttribute($name, $value);
            }
        }

        return true;
    }

    /**
     * Default softDelete method should throws exception
     * With any softDelete Method we should use transaction and try catch block
     *
     * @throws LogicException
     */
    public function softDelete()
    {
        if (parent::softDelete() === false) {
            throw new LogicException('Error while model delete!');
        }
        return true;
    }

    /**
     * @throws LogicException
     */
    public function restore()
    {
        if (parent::restore() === false) {
            throw new LogicException('Error while model restore!');
        }
        return true;
    }
}