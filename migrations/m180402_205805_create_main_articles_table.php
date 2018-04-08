<?php

use yii\db\Migration;
use yii\db\Expression;
use app\models\Article;

/**
 * Handles the creation of table `main_articles`.
 */
class m180402_205805_create_main_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('main_articles', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'is_deleted' => $this->boolean()->notNull()->defaultValue(false),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-main_articles-article_id',
            'main_articles',
            'article_id',
            'articles',
            'id',
            'CASCADE'
        );

        /**
         * @var $lastArticle Article
         */
        $lastArticle = Article::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(1)
            ->one();

        $this->insert(
            'main_articles',
            [
                'article_id' => $lastArticle->id,
                'is_deleted' => false,
                'created_at' => new Expression('NOW()'),
                'updated_at' => new Expression('NOW()'),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('main_articles');
    }
}
