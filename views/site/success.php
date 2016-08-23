<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MyUser */
/* @var $form ActiveForm */
$this->title = 'Успешна регистрация !';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Натиснете бутона за вход в системата:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>



    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        <?= Html::a('Вход', ['/site/login'], ['class'=>'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- register -->