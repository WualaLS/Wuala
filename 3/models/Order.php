<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property string $order_id
 * @property string $order_user_id
 * @property int $order_bags
 * @property int $order_type 0 = Single Wash 1 = Pro 2 = Premium
 * @property int $order_hypoallergenic
 * @property int $order_detergent 0 = Persil  1 = Tide 2 = Arm & Hammer 3 = Gain 4 = Other
 * @property string $order_detergent_other
 * @property int $order_dry_heat 0 = Low 1 = Medium 2 = High 3 = Hang Dry
 * @property int $order_dryer_sheets 0 = No 1 = Yes
 * @property string $order_date
 * @property string $order_pick_up_time
 * @property string $order_preferred_drop_off
 * @property string $order_pick_up
 * @property string $order_drop_off
 * @property int $order_status 0 = pending 1 =  processing 2 = completed
 * @property string $order_special_instructions
 * @property string $order_admin_notes
 * @property string $order_driver_id
 * @property string $order_washer_id
 * @property int $order_payment_approved 0 = No 1 = Yes
 * @property string $order_payment_paypal_id
 * @property string $order_drop_off_washer_driver
 * @property string $order_drop_off_washer_washer
 * @property string $order_pick_up_washer_driver
 * @property string $order_pick_up_washer_washer
 * @property string $order_checklist_washer
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'order_user_id'], 'required'],
            [['order_bags', 'order_type', 'order_hypoallergenic', 'order_detergent', 'order_dry_heat', 'order_dryer_sheets', 'order_status', 'order_payment_approved'], 'integer'],
            [['order_date', 'order_pick_up', 'order_drop_off', 'order_drop_off_washer_driver', 'order_drop_off_washer_washer', 'order_pick_up_washer_driver', 'order_pick_up_washer_washer', 'order_checklist_washer'], 'safe'],
            [['order_id', 'order_user_id', 'order_detergent_other', 'order_pick_up_time', 'order_preferred_drop_off', 'order_driver_id', 'order_washer_id'], 'string', 'max' => 45],
            [['order_special_instructions', 'order_admin_notes'], 'string', 'max' => 1000],
            [['order_payment_paypal_id'], 'string', 'max' => 50],
            [['order_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_user_id' => 'Order User ID',
            'order_bags' => 'Order Bags',
            'order_type' => 'Order Type',
            'order_hypoallergenic' => 'Order Hypoallergenic',
            'order_detergent' => 'Order Detergent',
            'order_detergent_other' => 'Order Detergent Other',
            'order_dry_heat' => 'Order Dry Heat',
            'order_dryer_sheets' => 'Order Dryer Sheets',
            'order_date' => 'Order Date',
            'order_pick_up_time' => 'Order Pick Up Time',
            'order_preferred_drop_off' => 'Order Preferred Drop Off',
            'order_pick_up' => 'Order Pick Up',
            'order_drop_off' => 'Order Drop Off',
            'order_status' => 'Order Status',
            'order_special_instructions' => 'Order Special Instructions',
            'order_admin_notes' => 'Order Admin Notes',
            'order_driver_id' => 'Order Driver ID',
            'order_washer_id' => 'Order Washer ID',
            'order_payment_approved' => 'Order Payment Approved',
            'order_payment_paypal_id' => 'Order Payment Paypal ID',
            'order_drop_off_washer_driver' => 'Order Drop Off Washer Driver',
            'order_drop_off_washer_washer' => 'Order Drop Off Washer Washer',
            'order_pick_up_washer_driver' => 'Order Pick Up Washer Driver',
            'order_pick_up_washer_washer' => 'Order Pick Up Washer Washer',
            'order_checklist_washer' => 'Order Checklist Washer',
        ];
    }
    public function getUser() 
    {
        return $this->hasOne(User::className(), ['user_id' => 'order_user_id']);
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
}
