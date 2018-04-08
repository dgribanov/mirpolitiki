<?php

use yii\db\Migration;
use yii\db\Expression;
use app\models\Article;

/**
 * Handles the creation of table `recommended_articles`.
 */
class m180408_181031_create_recommended_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('recommended_articles', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'is_deleted' => $this->boolean()->notNull()->defaultValue(false),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-recommended_articles-article_id',
            'recommended_articles',
            'article_id',
            'articles',
            'id',
            'CASCADE'
        );

        /**
         * @var $recommendedArticles Article[]
         */
        $recommendedArticles = Article::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(5)
            ->all();

        foreach ($recommendedArticles as $recommendedArticle) {
            $this->insert(
                'recommended_articles',
                [
                    'article_id' => $recommendedArticle->id,
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
        $this->dropTable('recommended_articles');
    }
}
