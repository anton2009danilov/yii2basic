<?php

use app\models\Task;
use yii\helpers\Html;
use yii\grid\GridView;

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
                    $names = $model->getCreator()->select('username')->column();
                    return join(', ', $names);
                }
            ],
            'created_at:datetime',
            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
            ],
        ],
    ]); ?>


</div>
