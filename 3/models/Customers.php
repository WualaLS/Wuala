<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $customers_id
 * @property string $customers_name
 * @property string $customers_address
 * @property string $customers_city
 * @property string $customers_state
 * @property string $customers_zip
 * @property string $customers_username
 * @property string $customers_password
 * @property string $customers_email
 * @property string $customers_birthday
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
            [['customers_id'], 'integer'],
            [['customers_name', 'customers_address', 'customers_city', 'customers_state', 'customers_zip', 'customers_username', 'customers_password', 'customers_email', 'customers_birthday'], 'string', 'max' => 45],
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
            'customers_name' => 'Customers Name',
            'customers_address' => 'Customers Address',
            'customers_city' => 'Customers City',
            'customers_state' => 'Customers State',
            'customers_zip' => 'Customers Zip',
            'customers_username' => 'Customers Username',
            'customers_password' => 'Customers Password',
            'customers_email' => 'Customers Email',
            'customers_birthday' => 'Customers Birthday',
        ];
    }
}
