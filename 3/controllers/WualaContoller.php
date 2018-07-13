<?php

namespace app\controllers;

use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\web\NotFoundHttpException;

class WualaController extends Controller
{
	public $enableCsrfValidation = false;

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        if (strpos(Yii::$app->request->referrer, 'http://localhost') === 0) {
        	$behaviors['authenticator'] = [
        		'class' => CompositeAuth::className(),
        		'authMethods' => [
        			QueryParamAuth::className(),
        		],
        		'only' => [
        			'test'
        		]
        	];
        }

        $behaviors['access'] [
        	'class' => AccessControl::className(),
        	'rules' => [
        		[
        			'actions' => [
        				'test'
        			],
        			'allow' => true,
        			'roles' => ['?']
        		],
        	],
        ];
        return $behaviors;
    }

    public function actionTest(){

    	\Yii::$app->response->format = Response::FORMAT_JSON;

    	return "It Worked!";
    }
}
