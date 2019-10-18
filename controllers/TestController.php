<?php


namespace app\controllers;


use yii\base\Controller;
use app\models\Product;

class TestController extends Controller
{
    public function actionIndex() {
        $product = new Product();
        $product->id = 3;
        $product->name = 'Pikachu';
        $product->category = 'Toys';
        $product->price = '200';

        return $this->render('index', ['text'=>'some text', 'product'=>$product]);
    }
}