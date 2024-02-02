<?php

use yii\db\Migration;

/**
 * Class m240130_134744_first_migration
 */
class m240130_134744_first_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user',
        [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string(),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }

}
