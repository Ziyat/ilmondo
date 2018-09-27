<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\entities;

use Codeception\Module\Cli;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $client_id
 * @property integer $product_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $quantity
 *
 * @property Product $product
 * @property Client $client
 */
class Order extends ActiveRecord
{
    public const STATUS_NEW = 10;
    public const STATUS_SOLD = 20;
    public const STATUS_CANCELED = 30;

    public static function create($product_id, $client_id, $status, $quantity)
    {
        $order = new static();
        $order->product_id = $product_id;
        $order->client_id = $client_id;
        $order->status = $status;
        $order->quantity = $quantity;
        $order->created_at = time();
        return $order;
    }

    public function edit($product_id, $client_id, $quantity)
    {
        $this->product_id = $product_id;
        $this->client_id = $client_id;
        $this->quantity = $quantity;
    }

    public function getProduct(): ActiveQuery
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getClient(): ActiveQuery
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    // status

    /**
     * @throws \DomainException
     */
    public function statusNew(): void
    {
        if ($this->isNew()) {
            throw new \DomainException('Status is already new');
        }
        $this->status = self::STATUS_NEW;
    }

    /**
     * @throws \DomainException
     */
    public function statusSold(): void
    {
        if ($this->isSold()) {
            throw new \DomainException('Status is already sold');
        }
        $this->status = self::STATUS_SOLD;
    }

    /**
     * @throws \DomainException
     */
    public function statusCanceled(): void
    {
        if ($this->isCanceled()) {
            throw new \DomainException('Status is already canceled');
        }
        $this->status = self::STATUS_CANCELED;

    }

    public function isNew(): bool
    {
        return $this->status == self::STATUS_NEW;
    }

    public function isSold(): bool
    {
        return $this->status == self::STATUS_SOLD;
    }

    public function isCanceled(): bool
    {
        return $this->status == self::STATUS_CANCELED;
    }

    public static function tableName()
    {
        return '{{%orders}}';
    }

    public function attributeLabels()
    {
        return [
            'client_id' => 'Клиент',
            'product_id' => 'Товар',
            'quantity' => 'Количество',
            'status' => 'Состояние',
            'created_at' => 'Дата добавления',
        ];
    }
}