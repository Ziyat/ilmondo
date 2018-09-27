<?php

use app\modules\admin\entities\Order;
use app\modules\admin\helpers\OrderHelper;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <?= Html::a('Оформить заказ', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="box-body">
                <?php try {
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'id',
                                'value' => function (Order $order) {
                                    return Html::a('Заказ № ' . $order->id, ['view', 'id' => $order->id]);
                                },
                                'format' => 'raw',
                            ],
                            [
                                'attribute' => 'product_id',
                                'value' => function (Order $order) {
                                    return OrderHelper::getProductLink($order->product);
                                },
                                'format' => 'raw',
                                'filter' => $searchModel->getProductList()
                            ],
                            [
                                'attribute' => 'client_id',
                                'value' => function (Order $order) {
                                    return OrderHelper::getClientLink($order->client);
                                },
                                'format' => 'raw',
                                'filter' => $searchModel->getClientList()
                            ],
                            [
                                'attribute' => 'status',
                                'value' => function (Order $order) {
                                    return OrderHelper::statusLabel($order->status);
                                },
                                'format' => 'raw',
                                'filter' => OrderHelper::statusList()
                            ],
                            'quantity',
                            'created_at:datetime',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                } ?>
            </div>
        </div>
    </div>
</div>
