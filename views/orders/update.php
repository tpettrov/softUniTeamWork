<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
use app\models\MyUser;

$this->title = 'Промяна на поръчка: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= MyUser::getUsername() != 'Admin' ? (null) : ($form->field($model, 'state')->dropDownList(['Обработва се'=>'обработва се', 'Склад'=>'склад','Пътува' => 'пътува', 'Доставена' =>  'доставена'])) ?>

    <?= MyUser::getUsername() == 'Admin' && $model->state == "Доставена" ? ($form->field($model, 'holder')->textInput(['maxlength' => true])) : (null) ?>

    <?= $form->field($model, 'user')-> textInput(['readonly' => true])  ?>



    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
