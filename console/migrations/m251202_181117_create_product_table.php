<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m251202_181117_create_product_table extends Migration
{
    public function safeUp(): void
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'price' => $this->decimal(10,2)->notNull()->unsigned(),
            'stock' => $this->integer()->notNull()->defaultValue(0)->unsigned(),
            'category_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex('idx-product-name', '{{%product}}', 'name');
        $this->createIndex('idx-product-category_id', '{{%product}}', 'category_id');

        $this->addForeignKey(
            'fk-product-category',
            '{{%product}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('fk-product-category', '{{%product}}');
        $this->dropIndex('idx-product-name', '{{%product}}');
        $this->dropIndex('idx-product-category_id', '{{%product}}');
        $this->dropTable('{{%product}}');
    }
}