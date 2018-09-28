<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use app\models\LoginForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserApiController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => [
                        'is-guest',
                        'is-logged-in',
                        'user-login',
                        'put-user-ajax',
                        'test'
                    ],
                    'allow' => true,
                    // 'roles' => ['?'],
                ]
            ]
        ];
        return $behaviors;
    }

    public function actionTest()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        return "It Worked!";
    }
    public function actionIsGuest()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        return \Yii::$app->user->isGuest;
    }
    public function actionIsLoggedIn()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        return !\Yii::$app->user->isGuest;
    }
    public function actionUserLogin()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new LoginForm();
        $response = [];
        $response['loggedIn'] = false;
        $response['info'] = 'Not Set';
        $response['accessToken'] = null;

        $model->username = Yii::$app->request->post()['username'];
        $model->password = Yii::$app->request->post()['password'];

        if ($model->login()) {
            $response['loggedIn'] = true;
            $response['info'] = 'Good';
            $response['accessToken'] = User::find()->select(['user_authkey'])->where(['user_id' => \Yii::$app->user->getId()])->one()['user_authkey'];
            return $response;
        } else {
            $response['info'] = 'No Good Creds';
            return $response;
        }
    }
    public function actionPutUserAjax()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');

        $model = new User();
        $model->loadAll($UpModel);
        // $model->user_id = $UpModel['user_id'];
        $model->user_salt = $model->generateSalt();
        $model->user_password = $model->hashPassword($model->user_password, $model->user_salt);
        $UpModel["saved"] = $model->save();
        $UpModel["errors"] = $model->errors;
        $UpModel["model"] = $model;

        return $UpModel;
    }
}
