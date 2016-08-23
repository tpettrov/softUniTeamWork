<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
use app\models\MyUser;

$this->title = "Преглед на поръчка номер: $model->id";
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$buttonChange = Html::a('Промени', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
$buttonDelete = Html::a('Изтрий', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
]);
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= MyUser::getUsername() == 'Admin' || $model->state == 'обработва се' ? $buttonChange : null ?>

        <?= MyUser::getUsername() == 'Admin'|| $model->state == 'обработва се' ? $buttonDelete : null  ?>
        <?= Html::a('Виж всички', ['index', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content:ntext',
            'adress',
            'date',
            'state',
            'user',
            'holder',
        ],
    ]) ?>

</div>
