<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'user_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_salt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_authkey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_zip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_mobile_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_home_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_birthday')->textInput() ?>

    <?= $form->field($model, 'user_washer')->textInput() ?>

    <?= $form->field($model, 'user_active')->textInput() ?>

    <?= $form->field($model, 'user_password_last_updated')->textInput() ?>

    <?= $form->field($model, 'user_password_last_updated_by')->textInput() ?>

    <?= $form->field($model, 'user_password_reset')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
