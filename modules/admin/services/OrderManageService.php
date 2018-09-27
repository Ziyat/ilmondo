<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\services;


use app\modules\admin\entities\Order;
use app\modules\admin\forms\OrderForm;
use app\modules\admin\repositories\ClientRepository;
use app\modules\admin\repositories\OrderRepository;
use app\modules\admin\repositories\ProductRepository;

/**
 * @property ProductRepository $products
 * @property ClientRepository $clients
 * @property OrderRepository $orders
 */
class OrderManageService
{
    private $products;
    private $clients;
    private $orders;

    public function __construct(
        ProductRepository $productRepository,
        ClientRepository $clientRepository,
        OrderRepository $orderRepository
    )
    {
        $this->products = $productRepository;
        $this->clients = $clientRepository;
        $this->orders = $orderRepository;
    }

    /**
     * @param OrderForm $form
     * @return Order
     * @throws \DomainException
     * @throws \LogicException
     * @throws \yii\web\NotFoundHttpException
     */
    public function create(OrderForm $form): Order
    {
        $product = $this->products->find($form->product);
        $client = $this->clients->find($form->client);

        $order = Order::create($product->id, $client->id, $form->status, $form->quantity);

        $product->downQuantity($form->quantity);

        $this->products->save($product);
        $this->orders->save($order);

        return $order;
    }

    /**
     * @param $id
     * @param OrderForm $form
     * @return Order
     * @throws \DomainException
     * @throws \LogicException
     * @throws \yii\web\NotFoundHttpException
     */
    public function edit($id, OrderForm $form): Order
    {
        $order = $this->orders->find($id);
        $product = $this->products->find($form->product);
        $client = $this->clients->find($form->client);

        $order->edit($product->id, $client->id, $form->quantity);

        $product->upQuantity($form->_order->quantity);
        $product->downQuantity($form->quantity);

        $this->products->save($product);
        $this->orders->save($order);

        return $order;
    }

    /**
     * @param $id
     * @throws \DomainException
     * @throws \LogicException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * @throws \yii\web\NotFoundHttpException
     */
    public function remove($id)
    {
        $order = $this->orders->find($id);
        $product = $order->product;
        $product->upQuantity($order->quantity);
        $this->products->save($product);
        $this->orders->remove($order);
    }

    /**
     * @param $id
     * @throws \DomainException
     * @throws \yii\web\NotFoundHttpException
     */
    public function statusNew($id)
    {
        $order = $this->orders->find($id);
        $order->statusNew();
        $this->orders->save($order);
    }

    /**
     * @param $id
     * @throws \DomainException
     * @throws \yii\web\NotFoundHttpException
     */
    public function statusSold($id)
    {
        $order = $this->orders->find($id);
        $order->statusSold();
        $this->orders->save($order);
    }

    /**
     * @param $id
     * @throws \DomainException
     * @throws \yii\web\NotFoundHttpException
     */
    public function statusCanceled($id)
    {
        $order = $this->orders->find($id);
        $order->statusCanceled();
        $this->orders->save($order);
    }
}