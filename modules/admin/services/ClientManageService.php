<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\services;


use app\modules\admin\entities\Client;
use app\modules\admin\forms\ClientForm;
use app\modules\admin\repositories\ClientRepository;

/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * Class ClientManageService
 * @package app\modules\admin\services
 * @property ClientRepository $clients
 */
class ClientManageService
{
    public $clients;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clients = $clientRepository;
    }

    /**
     * @param ClientForm $form
     * @return Client
     * @throws \DomainException
     */
    public function create(ClientForm $form): Client
    {
        $client = Client::create(
            $form->name,
            $form->last_name,
            $form->address_line_1,
            $form->address_line_2,
            $form->date_of_birth,
            $form->phone,
            $form->email,
            $form->params,
            $form->avatar
        );

        $this->clients->save($client);

        return $client;
    }

    /**
     * @param $id
     * @param ClientForm $form
     * @return Client
     * @throws \DomainException
     * @throws \yii\web\NotFoundHttpException
     */
    public function edit($id, ClientForm $form): Client
    {
        $client = $this->clients->find($id);
        $client->edit(
            $form->name,
            $form->last_name,
            $form->address_line_1,
            $form->address_line_2,
            $form->date_of_birth,
            $form->phone,
            $form->email,
            $form->params,
            $form->avatar
        );

        $this->clients->save($client);

        return $client;
    }

    /**
     * @param $id
     * @throws \DomainException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * @throws \yii\web\NotFoundHttpException
     */
    public function remove($id): void
    {
        $client = $this->clients->find($id);
        $this->clients->remove($client);
    }

    public function assignClient()
    {

    }
}