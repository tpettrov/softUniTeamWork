<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MyUser */
/* @var $form ActiveForm */
$this->title = 'Регистрирай се';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Моля въведете желаните от Вас потребител и парола:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username') ->label('Потребителско име:')?>
        
        <?= $form->field($model, 'password') -> passwordInput()->label('Парола:') ?>

        <?= $form->field($model, 'fullname') ->label('Име и фамилия:') ?>
    
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Регистрирай', ['class' => 'btn btn-primary']) ?>
                </div>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- register -->
