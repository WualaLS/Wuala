<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscribers".
 *
 * @property string $subscribers_id
 * @property string $subscribers_first_name
 * @property string $subscribers_last_name
 * @property string $subscribers_email
 * @property int $subscribers_washer
 */
class Subscribers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subscribers_id', 'subscribers_email'], 'required'],
            [['subscribers_washer'], 'integer'],
            [['subscribers_id', 'subscribers_email'], 'string', 'max' => 45],
            [['subscribers_first_name', 'subscribers_last_name'], 'string', 'max' => 128],
            [['subscribers_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subscribers_id' => 'Subscribers ID',
            'subscribers_first_name' => 'Subscribers First Name',
            'subscribers_last_name' => 'Subscribers Last Name',
            'subscribers_email' => 'Subscribers Email',
            'subscribers_washer' => 'Subscribers Washer',
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
