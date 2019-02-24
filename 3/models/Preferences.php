<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preferences".
 *
 * @property int $preferences_id
 * @property string $preferences_user_id_fk
 * @property int $preferences_hypoallergenic 0 = No 1 = Yes
 * @property int $preferences_detergent 0 = Persil  1 = Tide 2 = Arm & Hammer 3 = Gain 4 = Other
 * @property string $preferences_detergent_other
 * @property int $preferences_dry_heat 0 = Low 1 = Medium 2 = High 3 = Hang Dry
 * @property int $preferences_dryer_sheets 0 = No 1 = Yes
 */
class Preferences extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'preferences';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preferences_user_id_fk'], 'required'],
            [['preferences_hypoallergenic', 'preferences_detergent', 'preferences_dry_heat', 'preferences_dryer_sheets'], 'integer'],
            [['preferences_user_id_fk', 'preferences_detergent_other'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'preferences_id' => 'Preferences ID',
            'preferences_user_id_fk' => 'Preferences User Id Fk',
            'preferences_hypoallergenic' => 'Preferences Hypoallergenic',
            'preferences_detergent' => 'Preferences Detergent',
            'preferences_detergent_other' => 'Preferences Detergent Other',
            'preferences_dry_heat' => 'Preferences Dry Heat',
            'preferences_dryer_sheets' => 'Preferences Dryer Sheets',
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
