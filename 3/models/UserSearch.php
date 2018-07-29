<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_washer', 'user_active', 'user_password_last_updated_by', 'user_password_reset'], 'integer'],
            [['user_username', 'user_password', 'user_salt', 'user_authkey', 'user_first_name', 'user_last_name', 'user_address', 'user_city', 'user_state', 'user_zip', 'user_email', 'user_mobile_number', 'user_home_number', 'user_birthday', 'user_password_last_updated'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'user_birthday' => $this->user_birthday,
            'user_washer' => $this->user_washer,
            'user_active' => $this->user_active,
            'user_password_last_updated' => $this->user_password_last_updated,
            'user_password_last_updated_by' => $this->user_password_last_updated_by,
            'user_password_reset' => $this->user_password_reset,
        ]);

        $query->andFilterWhere(['like', 'user_username', $this->user_username])
            ->andFilterWhere(['like', 'user_password', $this->user_password])
            ->andFilterWhere(['like', 'user_salt', $this->user_salt])
            ->andFilterWhere(['like', 'user_authkey', $this->user_authkey])
            ->andFilterWhere(['like', 'user_first_name', $this->user_first_name])
            ->andFilterWhere(['like', 'user_last_name', $this->user_last_name])
            ->andFilterWhere(['like', 'user_address', $this->user_address])
            ->andFilterWhere(['like', 'user_city', $this->user_city])
            ->andFilterWhere(['like', 'user_state', $this->user_state])
            ->andFilterWhere(['like', 'user_zip', $this->user_zip])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'user_mobile_number', $this->user_mobile_number])
            ->andFilterWhere(['like', 'user_home_number', $this->user_home_number]);

        return $dataProvider;
    }
}
