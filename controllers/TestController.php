<?php


namespace app\controllers;


use app\components\TestService;
use yii\base\Controller;
use app\models\Product;

class TestController extends Controller
{
    public function actionIndex() {

        $test = (\Yii::$app->test)->getProp();



        return $this->render('index', ['test'=>$test]);
    }
}