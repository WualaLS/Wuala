<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'user_username',
            'user_password',
            'user_salt',
            'user_authkey',
            //'user_first_name',
            //'user_last_name',
            //'user_address',
            //'user_city',
            //'user_state',
            //'user_zip',
            //'user_email:email',
            //'user_mobile_number',
            //'user_home_number',
            //'user_birthday',
            //'user_washer',
            //'user_active',
            //'user_password_last_updated',
            //'user_password_last_updated_by',
            //'user_password_reset',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
