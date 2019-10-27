<?php

namespace app\models;

use Yii;
use yii\debug\components\search\Filter;
use yii\validators\DateValidator;
use yii\validators\FilterValidator;
use yii\validators\NumberValidator;
use yii\validators\RequiredValidator;
use yii\validators\StringValidator;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property int $created_at
 */
class Product extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['name'],
            self::SCENARIO_CREATE => ['name', 'price', 'created_at'],
            self::SCENARIO_UPDATE => ['price'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'created_at'], RequiredValidator::class, 'on' => ['create', 'update']],
            [['price'], NumberValidator::class, 'integerOnly' => true, 'min' => 0, 'max' => 1000,
                'on' => ['create', 'update']],
//            [['created_at'], DateValidator::class],
            [['name'], StringValidator::class, 'max' => 20, 'on' => ['create', 'update']],
            [['name'], FilterValidator::class, 'filter' => function($name) {
                return trim($name);
            }, 'on' => ['create', 'update']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }
}
