<?php

use yii\db\Migration;

/**
 * Class m191104_030339_create_foreign_keys_4
 */
class m191104_030339_create_foreign_keys_4 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fx_task_user2', 'task', ['updater_id'], 'user', ['id']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_task_user2', 'task');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191104_030339_create_foreign_keys_4 cannot be reverted.\n";

        return false;
    }
    */
}
