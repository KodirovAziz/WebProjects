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
            'id'=>$this->primaryKey(),
            'username'=>$this->string()->notNull(),
            'password'=>$this->string(),
            'name'=>$this->string(),
            'surname'=>$this->string(),
            'age'=>$this->integer(),
            'picture'=>$this->text()
        ]);

        $this->createTable('comments', [
            'id'=>$this->primaryKey(),
            'content'=>$this->text(),
            'created_by'=>$this->integer()
        ]);

        $this->addForeignKey('comment_user_created_by', 'comments', 'created_by', 'user','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240130_134744_first_migration cannot be reverted.\n";

        return false;
    }

}
