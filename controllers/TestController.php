<?php


namespace app\controllers;


use app\components\TestService;
use Yii;
use yii\base\Controller;
use app\models\Product;
use yii\db\Query;
use yii\helpers\VarDumper;

class TestController extends Controller
{
    public function actionIndex() {

        $product = new Product();


//        $product->name = 'Volga';
//        $product->price = 999;
//        $product->created_at = 20191102;
//        $product->save();

//        _log($product);

        $test = (Yii::$app->test)->getProp();
        return $this->render('index', ['test'=>$test]);
    }

    public function actionInsert() {
//        \Yii::$app->db->createCommand()->insert('user',
//            [
//                'username' => 'user1',
//                'name' => 'test',
//                'password_hash' => '12345',
//                'creator_id' => '1',
//                'created_at' => '20191030'
//            ])->execute();

//        \Yii::$app->db->createCommand()->insert('user',
//            [
//                'username' => 'user2',
//                'name' => 'test2',
//                'password_hash' => '12345',
//                'creator_id' => '1',
//                'created_at' => '20191030'
//            ])->execute();

//        Yii::$app->db->createCommand()->insert('user',
//            [
//                'username' => 'user3',
//                'name' => 'test3',
//                'password_hash' => '12345',
//                'creator_id' => '2',
//                'created_at' => '20191030'
//            ])->execute();

//        Yii::$app->db->createCommand()->batchInsert('task',
//            ['title', 'description', 'creator_id', 'created_at'],
//            [
//                ['task1', 'desk1', '2', '20191025'],
//                ['task2', 'desk2', '1', '20191027'],
//                ['task3', 'desk3', '4', '20191030'],
//            ])->execute();

    }

    public function actionSelect() {
//        VarDumper::dump((new Query())->from('user')->where('id = 3')->all(),2, true);

//        VarDumper::dump((new Query()->from('user')->all(),2, true);

//        VarDumper::dump((new Query()->from('task')->all(),2, true);

//        VarDumper::dump((new Query()->from('user')->count(),2, true);

//        VarDumper::dump((new Query()->createCommand()->delete('user', 'id > 4')->execute(),2, true);

//        VarDumper::dump((new Query()->createCommand()->delete('task', 'id < 5')->execute(),2, true);

//        VarDumper::dump((new Query()->createCommand()->update('user',
//            ['username' => 'user4', 'name' => 'test4'], ('id = 4'))->execute(),3, true);

//        VarDumper::dump((new Query()->from('user')
//            ->where('id > 3')->orderBy('name')->all(),3, true);

//        VarDumper::dump((new Query()->from('task')
//            ->innerJoin('user', 'task.creator_id = user.id')->all(),2, true);

        die;

    }

}