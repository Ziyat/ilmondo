<?php

namespace app\modules\admin\search;

use app\modules\admin\entities\Client;
use app\modules\admin\entities\Product;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\entities\Order;
use yii\helpers\ArrayHelper;

/**
 * OrderSearch represents the model behind the search form of `app\modules\admin\entities\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'client_id', 'status', 'created_at'], 'integer'],
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
     * @param $params
     * @return ActiveDataProvider
     * @throws \yii\base\InvalidArgumentException
     */
    public function search($params)
    {
        $query = Order::find();

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
            'id' => $this->id,
            'product_id' => $this->product_id,
            'client_id' => $this->client_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        return $dataProvider;
    }


    public function getProductList(): array
    {
        return ArrayHelper::map(Product::find()->active()->asArray()->all(), 'id', function ($model) {
            return $model['name'] . ' (' . $model['article'] . ')';
        });
    }

    public function getClientList(): array
    {
        return ArrayHelper::map(Client::find()->asArray()->all(), 'id', 'name');
    }
}
