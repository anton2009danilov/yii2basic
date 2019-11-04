<?php

use yii\db\Migration;

/**
 * Class m191104_030335_create_foreign_keys_3
 */
class m191104_030335_create_foreign_keys_3 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fx_task_user1', 'task', ['creator_id'], 'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_task_user1', 'task');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191104_030335_create_foreign_keys_3 cannot be reverted.\n";

        return false;
    }
    */
}
