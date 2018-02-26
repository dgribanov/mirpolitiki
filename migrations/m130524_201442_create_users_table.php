<?php

use yii\db\Migration;
use yii\db\Expression;

class m130524_201442_create_users_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'is_deleted' => $this->boolean()->notNull()->defaultValue(false),
            'is_admin' => $this->boolean()->notNull()->defaultValue(false),
            'is_superadmin' => $this->boolean()->notNull()->defaultValue(false),

        ], $tableOptions);

        $this->insert('users', [
            'username' => 'root',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('superadmin'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'email' => 'root@mirpolitiki.net',
            'created_at' => new Expression('NOW()'),
            'updated_at' => new Expression('NOW()'),
            'is_admin' => true,
            'is_superadmin' => true,
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}
