<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $user_id
 * @property string $user_username
 * @property string $user_password
 * @property string $user_salt
 * @property string $user_authkey
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_address_line_one
 * @property string $user_address_line_two
 * @property string $user_city
 * @property string $user_state
 * @property string $user_zip
 * @property string $user_email
 * @property string $user_mobile_number
 * @property string $user_home_number
 * @property string $user_birthday
 * @property int $user_washer 0 = No 1 = Yes
 * @property int $user_driver 0 = No 1 = Yes
 * @property int $user_active 0 = No 1 = Yes
 * @property string $user_password_last_updated
 * @property int $user_password_last_updated_by
 * @property int $user_password_reset 0 = No 1 = Yes
 * @property int $user_pro 0 = No 1 = Yes
 * @property int $user_premium 0 = No 1 = Yes
 * @property int $user_admin 0 = No 1 = Yes
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_username', 'user_password', 'user_first_name', 'user_last_name', 'user_email'], 'required'],
            [['user_birthday', 'user_password_last_updated'], 'safe'],
            [['user_washer', 'user_driver', 'user_active', 'user_password_last_updated_by', 'user_password_reset', 'user_pro', 'user_premium', 'user_admin'], 'integer'],
            [['user_id', 'user_city', 'user_zip', 'user_email', 'user_mobile_number', 'user_home_number'], 'string', 'max' => 45],
            [['user_username', 'user_password', 'user_salt', 'user_first_name', 'user_last_name', 'user_address_line_one', 'user_address_line_two'], 'string', 'max' => 128],
            [['user_authkey'], 'string', 'max' => 36],
            [['user_state'], 'string', 'max' => 2],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_username' => 'User Username',
            'user_password' => 'User Password',
            'user_salt' => 'User Salt',
            'user_authkey' => 'User Authkey',
            'user_first_name' => 'User First Name',
            'user_last_name' => 'User Last Name',
            'user_address_line_one' => 'User Address Line One',
            'user_address_line_two' => 'User Address Line Two',
            'user_city' => 'User City',
            'user_state' => 'User State',
            'user_zip' => 'User Zip',
            'user_email' => 'User Email',
            'user_mobile_number' => 'User Mobile Number',
            'user_home_number' => 'User Home Number',
            'user_birthday' => 'User Birthday',
            'user_washer' => 'User Washer',
            'user_driver' => 'User Driver',
            'user_active' => 'User Active',
            'user_password_last_updated' => 'User Password Last Updated',
            'user_password_last_updated_by' => 'User Password Last Updated By',
            'user_password_reset' => 'User Password Reset',
            'user_pro' => 'User Pro',
            'user_premium' => 'User Premium',
            'user_admin' => 'User Admin',
        ];
    }
    public function getId()  
  {  
    return $this->getPrimaryKey();  
  }  
  public function getAuthKey()  
  {  
    return $this->user_authkey;  
  }  
  public function validateAuthKey($authKey)  
  {  
    return $this->getAuthKey() === $authKey;  
  }  
  public static function findIdentity($id)  
  {  
    return static::findOne($id);  
  }  
  public static function findIdentityByAccessToken($token, $type = null)  
  {  
    return static::findOne(['user_authkey' => $token]);  
  }  
  public static function findByUsername($username)  
  {  
    return static:: findOne(['user_username' => $username]);  
  }  
  public static function findByPasswordResetToken($token)  
  {  
    $expire = \Yii::$app->params['user.passwordResetTokenExpire'];  
    $parts = explode('_', $token);  
    $timestamp = (int) end($parts);  
    if ($timestamp + $expire < time()) {  
      // token expired  
      return null;  
    }  
  }  
  public function loadAll($data, $nullExtra = true)  
  {  
    foreach ($this->attributes() as $key => $value) {  
        if (array_key_exists($value, $data)) {  
            $this[$value] = $data[$value];  
        } else {  
            if ($nullExtra) {  
                $this[$value] = NULL;  
            }  
        }  
    }  
    return true;  
  }  
  public function hashPassword($password, $salt) {  
    return md5($salt.$password);  
  }  
  public function generateSalt() {  
    return uniqid('', true);  
  }  
  public function validatePassword($password)  
  {  
    return $this->user_password === md5($this->user_salt.$password);  
  }  
}
