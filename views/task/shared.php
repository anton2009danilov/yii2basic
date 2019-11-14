<?php

use app\models\Task;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shared Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

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

            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{unshareAll} {view}',
                    'buttons' => [
                            'unshareAll' =>  function ($url, Task $model, $key) {
                                $ico = \yii\bootstrap\Html::icon('remove');
                                return Html::a($ico, ['task-user/delete-all', 'taskId' => $model->id],
                                [
                                    'data' => [
                                    'confirm' => 'Are you sure you want to unshare this task?',
                                    'method' => 'post',
                                    ]
                                ]);
                            },
                    ],

            ],
        ],
    ]); ?>


</div>
