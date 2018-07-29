<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $customers_id
 * @property string $customers_first_name
 * @property string $customers_last_name
 * @property string $customers_address
 * @property string $customers_city
 * @property string $customers_state
 * @property string $customers_zip
 * @property string $customers_username
 * @property string $customers_password
 * @property string $customers_email
 * @property string $customers_birthday
 * @property int $customers_washer 0 = No 1 = Yes
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customers_id'], 'required'],
            [['customers_id', 'customers_washer'], 'integer'],
            [['customers_birthday'], 'safe'],
            [['customers_first_name', 'customers_last_name', 'customers_address', 'customers_city', 'customers_state', 'customers_zip', 'customers_username', 'customers_password', 'customers_email'], 'string', 'max' => 45],
            [['customers_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customers_id' => 'Customers ID',
            'customers_first_name' => 'Customers First Name',
            'customers_last_name' => 'Customers Last Name',
            'customers_address' => 'Customers Address',
            'customers_city' => 'Customers City',
            'customers_state' => 'Customers State',
            'customers_zip' => 'Customers Zip',
            'customers_username' => 'Customers Username',
            'customers_password' => 'Customers Password',
            'customers_email' => 'Customers Email',
            'customers_birthday' => 'Customers Birthday',
            'customers_washer' => 'Customers Washer',
        ];
    }
}
