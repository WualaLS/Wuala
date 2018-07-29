<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_username') ?>

    <?= $form->field($model, 'user_password') ?>

    <?= $form->field($model, 'user_salt') ?>

    <?= $form->field($model, 'user_authkey') ?>

    <?php // echo $form->field($model, 'user_first_name') ?>

    <?php // echo $form->field($model, 'user_last_name') ?>

    <?php // echo $form->field($model, 'user_address') ?>

    <?php // echo $form->field($model, 'user_city') ?>

    <?php // echo $form->field($model, 'user_state') ?>

    <?php // echo $form->field($model, 'user_zip') ?>

    <?php // echo $form->field($model, 'user_email') ?>

    <?php // echo $form->field($model, 'user_mobile_number') ?>

    <?php // echo $form->field($model, 'user_home_number') ?>

    <?php // echo $form->field($model, 'user_birthday') ?>

    <?php // echo $form->field($model, 'user_washer') ?>

    <?php // echo $form->field($model, 'user_active') ?>

    <?php // echo $form->field($model, 'user_password_last_updated') ?>

    <?php // echo $form->field($model, 'user_password_last_updated_by') ?>

    <?php // echo $form->field($model, 'user_password_reset') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
