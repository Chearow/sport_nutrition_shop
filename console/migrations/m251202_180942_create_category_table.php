<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m251202_180942_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex('idx-category-name', '{{%category}}', 'name');
    }

    public function safeDown(): void
    {
        $this->dropIndex('idx-category-name', '{{%category}}');
        $this->dropTable('{{%category}}');
    }
}
