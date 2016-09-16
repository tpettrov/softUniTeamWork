<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
use app\models\MyUser;
use yii\helpers\Url;

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
$url=Url::to(['orders/view', 'id'=>$model->id, 'slug'=>$model->slug]);
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= MyUser::getUsername() == 'Admin' || $model->state == 'Обработва се' ? $buttonChange : null ?>

        <?= MyUser::getUsername() == 'Admin'|| $model->state == 'Обработва се' ? $buttonDelete : null  ?>
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
