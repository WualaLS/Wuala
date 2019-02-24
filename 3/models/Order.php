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
            [['order_bags', 'order_type', 'order_hypoallergenic', 'order_detergent', 'order_dry_heat', 'order_dryer_sheets', 'order_status'], 'integer'],
            [['order_date', 'order_pick_up', 'order_drop_off'], 'safe'],
            [['order_id', 'order_user_id', 'order_detergent_other', 'order_pick_up_time', 'order_preferred_drop_off', 'order_driver_id', 'order_washer_id'], 'string', 'max' => 45],
            [['order_special_instructions', 'order_admin_notes'], 'string', 'max' => 1000],
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
        ];
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
