<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use app\models\MyUser;

$this->title = 'Вашите поръчки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Нова поръчка', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'content:ntext',
            'adress',
            'date',
            'state',
            'user',
            'holder',

            ['class' => 'yii\grid\ActionColumn',
                'visibleButtons' => ['update' => function ($model) {

                    if (MyUser::getUsername() == 'Admin') return true;
                    else return ($model->state == 'Обработва се' && MyUser::getUsername() != 'Admin') ? true : false;
                }, 'delete' => function ($model) {
                    if (MyUser::getUsername() == 'Admin') return true;
                    else
                     return ($model->state == 'Обработва се' && MyUser::getUsername() != 'Admin') ?  true : false;
                } ]],

        ],
    ]); ?>
</div>
