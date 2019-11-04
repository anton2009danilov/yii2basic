<?php

use yii\db\Migration;

/**
 * Class m191104_030330_create_foreign_keys_2
 */
class m191104_030330_create_foreign_keys_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fx_taskuser_task', 'task_user', ['task_id'], 'task', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_taskuser_task', 'task_user');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191104_030330_create_foreign_keys_2 cannot be reverted.\n";

        return false;
    }
    */
}
