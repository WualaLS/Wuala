<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customers_id') ?>

    <?= $form->field($model, 'customers_first_name') ?>

    <?= $form->field($model, 'customers_last_name') ?>

    <?= $form->field($model, 'customers_address') ?>

    <?= $form->field($model, 'customers_city') ?>

    <?php // echo $form->field($model, 'customers_state') ?>

    <?php // echo $form->field($model, 'customers_zip') ?>

    <?php // echo $form->field($model, 'customers_username') ?>

    <?php // echo $form->field($model, 'customers_password') ?>

    <?php // echo $form->field($model, 'customers_email') ?>

    <?php // echo $form->field($model, 'customers_birthday') ?>

    <?php // echo $form->field($model, 'customers_washer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
