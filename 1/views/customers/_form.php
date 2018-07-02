<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customers_id')->textInput() ?>

    <?= $form->field($model, 'customers_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customers_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customers_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customers_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customers_zip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customers_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customers_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customers_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customers_birthday')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
