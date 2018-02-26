<?php

use yii\db\Migration;

/**
 * Class m180114_183654_add_header_image_id_field_to_articles_table
 */
class m180114_183654_add_header_image_id_field_to_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('articles', 'header_image_id', $this->integer()->notNull());

        $this->addForeignKey(
            'fk-articles-header_image_id',
            'articles',
            'header_image_id',
            'image_files',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('articles', 'header_image_id');
    }
}
