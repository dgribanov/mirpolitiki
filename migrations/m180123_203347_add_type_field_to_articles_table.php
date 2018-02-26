<?php

use yii\db\Migration;

/**
 * Class m180123_203347_add_type_field_to_articles_table
 */
class m180123_203347_add_type_field_to_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('articles', 'type', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('articles', 'type');
    }
}
