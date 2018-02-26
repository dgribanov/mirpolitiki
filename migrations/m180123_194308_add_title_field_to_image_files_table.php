<?php

use yii\db\Migration;

/**
 * Class m180123_194308_add_title_field_to_image_files_table
 */
class m180123_194308_add_title_field_to_image_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('image_files', 'title', $this->string()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('image_files', 'title');
    }
}
