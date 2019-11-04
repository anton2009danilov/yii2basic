<?php

namespace app\controllers;

use app\models\Task;
use app\models\TaskUser;
use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionTest()
    {
//        $user = new User();
//        $user->username = 'user5';
//        $user->name = 'medved';
//        $user->password_hash = '666999666';
//        $user->creator_id = 3;
//        $user->created_at = 20191104;
//        $user->auth_key = '111';
//        $user->access_token = '222';
//        $user->save();

//        $user = User::findOne(10);


//        $task1 = new Task();
//        $task1->title = 'new task1';
//        $task1->description = 'some text';
//        $task1->save();
//        _log($task1->getErrors());
//        $user->link($user::RELATION_CREATED_TASKS, $task1);

//        $task2 = new Task();
//        $task2->title = 'new task2';
//        $task2->description = 'some text2';
//        $task2->save();
//        $user->link($user::RELATION_CREATED_TASKS, $task2);

//        $task3 = new Task();
//        $task3->title = 'new task3';
//        $task3->description = 'some text3';
//        $task3->save();
//        $user->link($user::RELATION_CREATED_TASKS, $task3);
//


//        $users = User::find()->with(USER::RELATION_CREATED_TASKS)->asArray()->all();
//        $users = User::find()->joinWith(USER::RELATION_CREATED_TASKS)->asArray()->all();

//        _log($users);
//        _log($user->getErrors());



//        $task_user1 = new TaskUser();
//        $task_user1->user_id = 2;
//        $task_user1->task_id = 5;
//        $task_user1->save();

//        $task_user2 = new TaskUser();
//        $task_user2->user_id = 1;
//        $task_user2->task_id = 6;
//        $task_user2->save();

//        $task_user3 = new TaskUser();
//        $task_user3->user_id = 4;
//        $task_user3->task_id = 7;
//        $task_user3->save();

//        $task_user4 = new TaskUser();
//        $task_user4->user_id = 10;
//        $task_user4->task_id = 8;
//        $task_user4->save();

//        $task_user5 = new TaskUser();
//        $task_user5->user_id = 10;
//        $task_user5->task_id = 11;
//        $task_user5->save();

//        $task_user6 = new TaskUser();
//        $task_user6->user_id = 10;
//        $task_user6->task_id = 12;
//        $task_user6->save();

//        $task_user7 = new TaskUser();
//        $task_user7->user_id = 10;
//        $task_user7->task_id = 5;
//        $task_user7->save();

        _end(User::findOne(10)->sharedTasks);



        return $this->render('test', ['test'=>1]);

    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
