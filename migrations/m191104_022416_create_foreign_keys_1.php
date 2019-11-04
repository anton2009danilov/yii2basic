<?php

use yii\db\Migration;

/**
 * Class m191104_022416_create_foreign_keys_1
 */
class m191104_022416_create_foreign_keys_1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fx_taskuser_user', 'task_user', ['user_id'], 'user', ['id']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fx_taskuser_user', 'task_user');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191104_022416_create_foreign_keys_1 cannot be reverted.\n";

        return false;
    }
    */
}
