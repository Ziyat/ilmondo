<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\forms;


use app\modules\admin\entities\Client;
use app\modules\admin\entities\Order;
use app\modules\admin\entities\Product;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * @property int $client;
 * @property int $product;
 * @property int $quantity;
 * @property int $status;
 * @property Order $_order;
 */
class OrderForm extends Model
{
    public $client;
    public $product;
    public $quantity;
    public $status;

    public $_order;

    public function __construct(Order $order = null, array $config = [])
    {
        if ($order) {
            $this->client = $order->client->id;
            $this->product = $order->product->id;
            $this->quantity = $order->quantity;
            $this->status = $order->status;
            $this->_order = $order;
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['client', 'quantity', 'product', 'status'], 'required'],
            [['client', 'quantity', 'product', 'status'], 'integer'],
        ];
    }

    public function getClientList(): array
    {
        return ArrayHelper::map(Client::find()->asArray()->all(), 'id', 'name');
    }

    public function getStatusList(): array
    {
        return [
            Order::STATUS_NEW => 'Новый',
            Order::STATUS_SOLD => 'Продан',
            Order::STATUS_CANCELED => 'Отменен',
        ];
    }

    public function getProductList(): array
    {
        return ArrayHelper::map(Product::find()->active()->asArray()->all(), 'id', function ($model) {
            return $model['name'] . ' (' . $model['article'] . ')';
        });
    }

    public function attributeLabels()
    {
        return [
            'client' => 'Клиент',
            'product' => 'Товар',
            'quantity' => 'Количество',
            'status' => 'Состояние',
        ];
    }
}