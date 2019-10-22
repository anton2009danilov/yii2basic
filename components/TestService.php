<?php


namespace app\components;


use yii\base\Component;

class TestService extends Component
{
    public $prop = 'default_value';

    public function getProp() {
        return $this->prop;
    }
}