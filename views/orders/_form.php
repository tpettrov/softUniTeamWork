<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

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

    <!--  <?= $form->field($model, 'date')->textInput()?>  -->

    <!-- <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'user')-> textInput(['readonly' => true])  ?>

    <!-- <?= $form->field($model, 'holder')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton($model->isNewRecord ? 'Изпрати' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        </div>


    <?php ActiveForm::end(); ?>

</div>
