<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\readModels;


use app\modules\admin\entities\Order;
use yii\web\NotFoundHttpException;

class OrderReadModel
{
    /**
     * @param $id
     * @return Order
     * @throws NotFoundHttpException
     */
    public function find($id): Order
    {
        if(!$order = Order::findOne($id))
        {
            throw new NotFoundHttpException('Client not found');
        }
        return $order;
    }
}