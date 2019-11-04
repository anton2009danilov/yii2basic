<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $password_hash
 * @property string $access_token
 * @property string $auth_key
 * @property int $creator_id
 * @property int $updater_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Task[] $createdTasks
 * @property Task[] $updatedTasks
 * @property TaskUser[] $taskUsers
 * @property TaskUser[] $sharedTasks
 */
class User extends \yii\db\ActiveRecord
{
    const RELATION_CREATED_TASKS = 'createdTasks';
    const RELATION_UPDATED_TASKS = 'updatedTasks';
    const RELATION_TASK_USERS = 'taskUsers';
    const RELATION_SHARED_TASKS = 'sharedTasks';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'password_hash', 'access_token', 'auth_key', 'creator_id', 'created_at'], 'required'],
            [['creator_id', 'updater_id', 'created_at', 'updated_at'], 'integer'],
            [['username', 'name', 'password_hash', 'access_token', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'password_hash' => 'Password Hash',
            'access_token' => 'Access Token',
            'auth_key' => 'Auth Key',
            'creator_id' => 'Creator ID',
            'updater_id' => 'Updater ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedTasks()
    {
        return $this->hasMany(Task::className(), ['creator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedTasks()
    {
        return $this->hasMany(Task::className(), ['updater_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSharedTasks()
    {
        return $this->hasMany(Task::className(), ['id' => 'task_id'])
            ->via(self::RELATION_TASK_USERS);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskUsers()
    {
        return $this->hasMany(TaskUser::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
