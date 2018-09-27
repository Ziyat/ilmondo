<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\helpers;


use app\modules\admin\entities\Client;
use app\modules\admin\entities\Order;
use app\modules\admin\entities\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class OrderHelper
{
    public static function getProductLink(Product $product)
    {
        return Html::a($product->name . ' (' . $product->article . ')', ['product/view', 'id' => $product->id]);
    }

    public static function getClientLink(Client $client)
    {
        return Html::a($client->name . ' (' . $client->last_name . ')', ['client/view', 'id' => $client->id]);
    }

    public static function statusList(): array
    {
        return [
            Order::STATUS_NEW => 'Новый',
            Order::STATUS_SOLD => 'Продан',
            Order::STATUS_CANCELED => 'Отменен',
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case Order::STATUS_NEW:
                $class = 'label label-info';
                break;
            case Order::STATUS_SOLD:
                $class = 'label label-success';
                break;
            case Order::STATUS_CANCELED:
                $class = 'label label-default';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }
}