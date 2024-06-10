<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clients}}`.
 */
class m240609_170956_create_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string()->notNull(),
            'lastName' => $this->string()->notNull(),
            'age' => $this->integer()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'phone' => $this->bigInteger()->notNull(),
            'addressCity' => $this->string()->notNull(),
            'addressState' => $this->string()->notNull(),
            'addressZip' => $this->string()->notNull(),
            'ssn' => $this->integer()->notNull(),
            'fico' => $this->integer()->notNull(),
            'income' => $this->decimal(10,2)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clients}}');
    }
}
