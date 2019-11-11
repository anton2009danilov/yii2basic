<?php

use app\models\Task;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            [
                'label' => 'users',
                'value' => function(Task $model) {
                    $ids = $model->getTaskUsers()->select('user_id')->column();
                    return join(', ', $ids);
                }
            ],
            'description:ntext',
            'created_at:datetime',
            'updated_at:datetime',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{share} {view} {update} {delete}',
                    'buttons' => [
                            'share' =>  function ($url, Task $model, $key) {
                                $ico = \yii\bootstrap\Html::icon('share');
                                return Html::a($ico, ['task-user/create', 'taskId' => $model->id]);
                            },
                    ],

            ],
        ],
    ]); ?>


</div>
