<?php

use yii\db\Migration;

/**
 * Handles the creation of table `articles_tags`.
 */
class m180204_201850_create_articles_tags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('articles_tags', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
            'is_deleted' => $this->boolean()->notNull()->defaultValue(false),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-articles_tags-article_id',
            'articles_tags',
            'article_id',
            'articles',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-articles_tags-tag_id',
            'articles_tags',
            'tag_id',
            'tags',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('articles_tags');
    }
}
