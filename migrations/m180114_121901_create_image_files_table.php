<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image_files`.
 */
class m180114_121901_create_image_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('image_files', [
            'id' => $this->primaryKey(),
            'description' => $this->string(255)->notNull(),
            'file_name' => $this->string(255)->notNull()->unique(),
            'is_deleted' => $this->boolean()->notNull()->defaultValue(false),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('image_files');
    }
}
