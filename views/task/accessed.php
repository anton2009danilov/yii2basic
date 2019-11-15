<?php

use app\models\Task;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accessed Tasks';
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
            'title',
            'description:ntext',
            [
                'label' => 'creator name',
                'value' => function(\app\models\Task $model) {
                    return Html::a(Html::encode($model->creator->username),
                        Url::to(['user/view', 'id' => $model->creator_id]));
                },
                'format' => 'html',

            ],
            'created_at:datetime',
            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
            ],
        ],
    ]); ?>


</div>
