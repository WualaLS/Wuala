<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customers;

/**
 * CustomersSearch represents the model behind the search form of `app\models\Customers`.
 */
class CustomersSearch extends Customers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customers_id'], 'integer'],
            [['customers_name', 'customers_address', 'customers_city', 'customers_state', 'customers_zip', 'customers_username', 'customers_password', 'customers_email', 'customers_birthday'], 'safe'],
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
        $query = Customers::find();

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
            'customers_id' => $this->customers_id,
        ]);

        $query->andFilterWhere(['like', 'customers_name', $this->customers_name])
            ->andFilterWhere(['like', 'customers_address', $this->customers_address])
            ->andFilterWhere(['like', 'customers_city', $this->customers_city])
            ->andFilterWhere(['like', 'customers_state', $this->customers_state])
            ->andFilterWhere(['like', 'customers_zip', $this->customers_zip])
            ->andFilterWhere(['like', 'customers_username', $this->customers_username])
            ->andFilterWhere(['like', 'customers_password', $this->customers_password])
            ->andFilterWhere(['like', 'customers_email', $this->customers_email])
            ->andFilterWhere(['like', 'customers_birthday', $this->customers_birthday]);

        return $dataProvider;
    }
}
