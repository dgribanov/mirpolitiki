<?php

use yii\db\Migration;
use yii\db\Expression;
use app\models\Article;

/**
 * Handles the creation of table `popular_articles`.
 */
class m180408_180343_create_popular_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('popular_articles', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'is_deleted' => $this->boolean()->notNull()->defaultValue(false),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-popular_articles-article_id',
            'popular_articles',
            'article_id',
            'articles',
            'id',
            'CASCADE'
        );

        /**
         * @var $popularArticles Article[]
         */
        $popularArticles = Article::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(5)
            ->all();

        foreach ($popularArticles as $popularArticle) {
            $this->insert(
                'popular_articles',
                [
                    'article_id' => $popularArticle->id,
                    'is_deleted' => false,
                    'created_at' => new Expression('NOW()'),
                    'updated_at' => new Expression('NOW()'),
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('popular_articles');
    }
}
