<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m180923_090748_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'client_id' => $this->integer(),
            'quantity' => $this->integer()->defaultValue(1),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
        ]);

        $this->createIndex('{{%idx-order-product_id}}','{{%order}}','product_id');
        $this->createIndex('{{%idx-order-client_id}}','{{%order}}','client_id');

        $this->addForeignKey('{{%fk-order-product_id}}','{{%order}}','product_id','{{%products}}','id','RESTRICT','NO ACTION');
        $this->addForeignKey('{{%fk-order-client_id}}','{{%order}}','client_id','{{%clients}}','id','RESTRICT','NO ACTION');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
