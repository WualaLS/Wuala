<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
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
                        'put-user-ajax'
                    ],
                    'allow' => true,
                    'roles' => ['?'],
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
    public function actionPutUserAjax()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');

        $model = new User();
        $model->loadAll($UpModel);
        $UpModel["saved"] = $model->save();
        $UpModel["errors"] = $model->errors;
        $UpModel["model"] = $model;

        return $UpModel;
    }
}
