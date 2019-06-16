<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Preferences;
use app\models\Subscribers;
use app\models\Order;
use app\models\UserSearch;
use app\models\LoginForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\filters\AccessControl;
use app\vendor\twilio\sdk\Twilio;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserApiController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */

    public static function allowedDomains() {
        return [
            '*',                        // star allows all domains
            // 'http://test1.example.com',
            // 'http://test2.example.com',
        ];
    }
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                QueryParamAuth::className(),
            ],
            'only' => [
                'is-guest',
                'is-logged-in',
                'user-login',
                'put-user-ajax',
                'test',
                'put-subscriber-ajax',
                'put-user-profile-ajax',
                'text-test',
                'schedule-wash-ajax',
                'get-pending-washes',
                'get-history-washes',
                'get-order',
                'get-drivers-dropdown',
                'get-washers-dropdown',
                'put-order-ajax',
                'submit-payment-ajax',
                'get-expert-assigned-washes'
            ]
        ];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => [
                        'is-guest',
                        'is-logged-in',
                        'user-login',
                        'put-user-ajax',
                        'test',
                        'put-subscriber-ajax',
                        'put-user-profile-ajax',
                        'text-test',
                        'schedule-wash-ajax',
                        'get-pending-washes',
                        'get-history-washes',
                        'get-order',
                        'get-drivers-dropdown',
                        'get-washers-dropdown',
                        'put-order-ajax',
                        'submit-payment-ajax',
                        'get-expert-assigned-washes'
   
                    ],
                    'allow' => true,
                    'roles' => ['?'],
                ]
            ]
        ];
        return $behaviors;
    }

    public function actionTextTest () {
        \Yii::$app->response->format = Response::FORMAT_JSON;
       $message = Yii::$app->twilio->sms('+13852377449', 'Hello World!');

        // It returns a \Twilio\Rest\Api\V2010\Account\MessageInstance
        echo $message->sid;
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
            $response['userInfo'] = User::find()->where(['user_id' => \Yii::$app->user->getId()])->one();
            $response['Preferences'] = Preferences::find()->where(['preferences_user_id_fk' => \Yii::$app->user->getId()])->one();
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

        $model = User::findOne($UpModel['user_username']);
        $modelExist = User::find()->andWhere(['user_username' => $UpModel['user_username']])->one();

        if ($modelExist) {
            return 'emailExists';
        } else {
            $model = new User();
            $model->loadAll($UpModel);
            // $model->user_id = $UpModel['user_id'];
            $model->user_salt = $model->generateSalt();
            $model->user_password = $model->hashPassword($model->user_password, $model->user_salt);
            $UpModel["saved"] = $model->save();
            $UpModel["errors"] = $model->errors;
            $UpModel["model"] = $model;

            $modelPreferences = new Preferences();
            $modelPreferences->preferences_user_id_fk = $model->user_id;
            $modelPreferences->preferences_hypoallergenic = 0;
            $modelPreferences->preferences_detergent = 3;
            $modelPreferences->preferences_detergent_other = null;
            $modelPreferences->preferences_dry_heat = 1;
            $modelPreferences->preferences_dryer_sheets = 1;
            $UpModel["savedPreferences"] = $modelPreferences->save();
            $UpModel["errorsPreferences"] = $modelPreferences->errors;
            $UpModel["Preferences"] = $modelPreferences;

            return $UpModel;
        }

    }
    public function actionPutSubscriberAjax()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');

        $model = new Subscribers();
        $model->loadAll($UpModel);
        $UpModel["saved"] = $model->save();
        $UpModel["errors"] = $model->errors;
        $UpModel["model"] = $model;

        return $UpModel;
    }
    public function actionPutUserProfileAjax()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');
        $UpModelPreferences = Yii::$app->request->post('UpModelPreferences');

        // $model = new User();
        $model = User::findOne($UpModel['user_id']);
        $model->loadAll($UpModel);

        $UpModel["saved"] = $model->save();
        $UpModel["errors"] = $model->errors;
        $UpModel["model"] = $model;

        $modelPreferences = Preferences::find()->andWhere(['preferences_user_id_fk' => $UpModel['user_id']])->one();
        $modelPreferences->loadAll($UpModelPreferences);

        $UpModel["savedPreferences"] = $modelPreferences->save();
        $UpModel["errorsPreferences"] = $modelPreferences->errors;
        $UpModel["Preferences"] = $modelPreferences;

        return $UpModel;
    }
    public function actionScheduleWashAjax()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');

        $model = new Order();
        $model->loadAll($UpModel);
        $UpModel["saved"] = $model->save();
        $UpModel["errors"] = $model->errors;
        $UpModel["model"] = $model;

        return $UpModel;
    }
    public function actionGetPendingWashes()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');
        if ($UpModel['user_id'] == null) {
            $pendingWashes = Order::find()->andWhere(['!=', 'order_status', 2])->all();
        } else {
            $pendingWashes = Order::find()->andWhere(['order_user_id' => $UpModel['user_id']])
            ->andWhere(['!=', 'order_status', 2])->all();
        }

        $pendingWashesOut = [];
        foreach ($pendingWashes as $key => $pendingWash) {
            $driver = User::find()->andWhere(['user_id' => $pendingWash['order_driver_id']])->one();
            $washer = User::find()->andWhere(['user_id' => $pendingWash['order_washer_id']])->one();
            array_push(
                $pendingWashesOut,
                [
                    "order_id" => $pendingWash['order_id'],
                    "order_bags" => $pendingWash['order_bags'],
                    "order_hypoallergenic" => $pendingWash['order_hypoallergenic'],
                    "order_user_id" => $pendingWash['order_user_id'],
                    "order_date" => $pendingWash['order_date'],
                    "order_pick_up_time" => $pendingWash['order_pick_up_time'],
                    "order_pick_up" => $pendingWash['order_pick_up'],
                    "order_drop_off" => $pendingWash['order_drop_off'],
                    "order_status" => $pendingWash['order_status'] ,
                    "driver_fullname" => $driver['user_first_name'].' '.$driver['user_last_name'],
                    "washer_fullname" => $washer ['user_first_name'].' '.$driver['user_last_name'] 
                ]
            );
        }

        return $pendingWashesOut;
    }
    public function actionGetHistoryWashes()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');
        if ($UpModel['user_id'] == null) {
            $historyWashes = Order::find()->andWhere(['order_status' => 2])->all();
        } else {
            $historyWashes = Order::find()->andWhere(['order_user_id' => $UpModel['user_id']])
            ->andWhere(['order_status' => 2])->all();
        }

        $historyWashesOut = [];
        foreach ($historyWashes as $key => $historyWash) {
            array_push(
                $historyWashesOut,
                [
                    "order_id" => $historyWash['order_id'],
                    "order_bags" => $historyWash['order_bags'],
                    "order_hypoallergenic" => $historyWash['order_hypoallergenic'],
                    "order_user_id" => $historyWash['order_user_id'],
                    "order_date" => $historyWash['order_date'],
                    "order_pick_up_time" => $historyWash['order_pick_up_time'],
                    "order_pick_up" => $historyWash['order_pick_up'],
                    "order_drop_off" => $historyWash['order_drop_off'],
                    "order_status" => $historyWash['order_status'],
                    "order_driver_id" => $historyWash['order_driver_id'],
                    "order_washer_id" => $historyWash['order_washer_id']     
                ]
            );
        }

        return $historyWashesOut;
    }
    public function actionGetExpertAssignedWashes()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');
        $assignedWashesDriver = Order::find()->andWhere(['order_driver_id' => $UpModel['user_id']])
            ->andWhere(['!=', 'order_status', 2])->all();
        $assignedWashesWasher = Order::find()->andWhere(['order_washer_id' => $UpModel['user_id']])
            ->andWhere(['!=', 'order_status', 2])->all();

        $assignedWashes = array_merge($assignedWashesDriver,$assignedWashesWasher);

        $assignedWashesOut = [];
        $pushedWashes = [];
        foreach ($assignedWashes as $key => $assignedWash) {
            if (!in_array($assignedWash['order_id'], $pushedWashes)) {
                array_push($pushedWashes,$assignedWash['order_id']);
                $driver = User::find()->andWhere(['user_id' => $assignedWash['order_driver_id']])->one();
                $washer = User::find()->andWhere(['user_id' => $assignedWash['order_washer_id']])->one();
                array_push(
                    $assignedWashesOut,
                    [
                        "order_id" => $assignedWash['order_id'],
                        "order_bags" => $assignedWash['order_bags'],
                        "order_hypoallergenic" => $assignedWash['order_hypoallergenic'],
                        "order_user_id" => $assignedWash['order_user_id'],
                        "order_date" => $assignedWash['order_date'],
                        "order_pick_up_time" => $assignedWash['order_pick_up_time'],
                        "order_pick_up" => $assignedWash['order_pick_up'],
                        "order_drop_off" => $assignedWash['order_drop_off'],
                        "order_status" => $assignedWash['order_status'] ,
                        "driver_fullname" => $driver['user_first_name'].' '.$driver['user_last_name'],
                        "washer_fullname" => $washer ['user_first_name'].' '.$driver['user_last_name'] 
                    ]
                );
            }
        }

        return $assignedWashesOut;
    }
    public function actionGetOrder()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');

        $order = Order::find()->andWhere(['order_id' => $UpModel['order_id']])->one();

        return $order;
    }
    public function actionGetOrderWithUser()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');

        $order = Order::find()->andWhere(['order_id' => $UpModel['order_id']])->with('user')->asArray()->one();

        // $user = User::find()->andWhere(['user_id' => $order['order_user_id']])->asArray()->one();

        // $order = array_merge($order,$user);

        return $order;
    }
    public function actionGetDriversDropdown()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $drivers = User::find()->andWhere(['user_driver' => 1])->all();

        $driversOut = [];
        
        foreach ($drivers as $key => $driver) {
            array_push(
                $driversOut,
                [
                    "label" => $driver['user_first_name']." ".$driver['user_last_name'],
                    "value" => $driver['user_id'],
                ]
            );
        }
        
        return $driversOut;
    }
    public function actionGetWashersDropdown()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $washers = User::find()->andWhere(['user_washer' => 1])->all();

        $washersOut = [];
        
        foreach ($washers as $key => $washer) {
            array_push(
                $washersOut,
                [
                    "label" => $washer['user_first_name']." ".$washer['user_last_name'],
                    "value" => $washer['user_id'],
                ]
            );
        }
        
        return $washersOut;
    }
    public function actionPutOrderAjax()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $UpModel = Yii::$app->request->post('UpModel');
        
        $model = Order::findOne($UpModel['order_id']);
        $model->loadAll($UpModel);

        $UpModel["saved"] = $model->save();
        $UpModel["errors"] = $model->errors;
        $UpModel["model"] = $model;

        return $UpModel;
    }
    public function actionSubmitPaymentAjax()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
         \Stripe\Stripe::setApiKey("sk_test_oWHlGKFrDBUAZChP118iyC2N");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = "tok_1EF9pMJr47OsH7OzvT25ybe9";
        $charge = \Stripe\Charge::create([
            'amount' => 100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);
    }
}
