<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%logs}}`.
 */
class m210715_162453_create_logs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%logs}}', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime(),
            'ip' => $this->string(64),
            'url' => $this->text(),
            'user_agent' => $this->text(),
            'os' => $this->string(64),
            'architecture' => $this->string(64),
            'browser' => $this->string(125),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%logs}}');
    }
}
