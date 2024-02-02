<?php

use yii\db\Migration;

/**
 * Class m240201_152904_comments_table
 */
class m240201_152904_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id'=>$this->primaryKey(),
            'content'=>$this->text()->notNull(),
            'status'=>$this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('comment_user_created_by', 'comments', 'created_by', 'user','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('comment_user_created_by', 'comments');
        $this->dropTable('comments');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240201_152904_comments_table cannot be reverted.\n";

        return false;
    }
    */
}
