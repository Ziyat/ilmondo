<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\readModels;


use app\modules\admin\entities\Client;
use yii\web\NotFoundHttpException;

class ClientReadModel
{
    /**
     * @param $id
     * @return Client
     * @throws NotFoundHttpException
     */
    public function find($id): Client
    {
        if(!$client = Client::findOne($id))
        {
            throw new NotFoundHttpException('Client not found');
        }
        return $client;
    }
}