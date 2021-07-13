<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%new_user}}`.
 */
class m210712_164507_create_new_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%new_user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'email' => $this->string(),
            'password' => $this->string(),
            'authKey' => $this->string(),
            'accessToken' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%new_user}}');
    }
}
