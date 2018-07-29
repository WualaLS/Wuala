<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'user_username',
            'user_password',
            'user_salt',
            'user_authkey',
            'user_first_name',
            'user_last_name',
            'user_address',
            'user_city',
            'user_state',
            'user_zip',
            'user_email:email',
            'user_mobile_number',
            'user_home_number',
            'user_birthday',
            'user_washer',
            'user_active',
            'user_password_last_updated',
            'user_password_last_updated_by',
            'user_password_reset',
        ],
    ]) ?>

</div>
