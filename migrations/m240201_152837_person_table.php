<?php

use yii\db\Migration;

/**
 * Class m240201_152837_person_table
 */
class m240201_152837_person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('person',
            [
                'id'=>$this->primaryKey(),
                'user_id' => $this->integer()->notNull(),
                'name'=>$this->string(),
                'surname'=>$this->string(),
                'age'=>$this->integer(),
                'picture'=>$this->text()
            ]);

        $this->addForeignKey('person_user_user_id', 'person', 'user_id', 'user','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('person_user_user_id', 'person');
        $this->dropTable('person');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240201_152837_person_table cannot be reverted.\n";

        return false;
    }
    */
}
