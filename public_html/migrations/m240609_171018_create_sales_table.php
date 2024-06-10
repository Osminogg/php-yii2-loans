<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sales}}`.
 */
class m240609_171018_create_sales_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sales', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'rate' => $this->decimal(5,2)->notNull(),
            'date' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-sales-client_id',
            'sales',
            'client_id',
            'clients',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-sales-product_id',
            'sales',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-sales-client_id', 'sales');
        $this->dropForeignKey('fk-sales-product_id', 'sales');
        $this->dropTable('sales');
    }
}
