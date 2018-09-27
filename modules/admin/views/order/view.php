<?php

use app\modules\admin\helpers\OrderHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $order app\modules\admin\entities\Order */

$this->title = 'Заказ № ' . $order->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$btnNew = Html::a('Новый', ['status-new', 'id' => $order->id], ['class' => 'btn btn-flat btn-info', 'data-method' => 'post']);
$btnSold = Html::a('Продан', ['status-sold', 'id' => $order->id], ['class' => 'btn btn-flat btn-success', 'data-method' => 'post']);
$btnCanceled = Html::a(Html::tag('i','',['class'=>'fa fa-remove']).' Отменен', ['status-canceled', 'id' => $order->id], ['class' => 'pull-right btn btn-flat btn-default', 'data-method' => 'post']);

?>
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <?= Html::a('Редактировать', ['update', 'id' => $order->id], ['class' => 'btn btn-flat btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $order->id], [
                    'class' => 'btn btn-flat btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="box-body">
                <?php try {
                    echo DetailView::widget([
                        'model' => $order,
                        'attributes' => [
                            [
                                'attribute' => 'id',
                                'value' => Html::a('Заказ № ' . $order->id, ['view', 'id' => $order->id]),
                                'format' => 'raw',
                            ],
                            [
                                'attribute' => 'product_id',
                                'value' => OrderHelper::getProductLink($order->product),
                                'format' => 'raw',
                            ],
                            [
                                'attribute' => 'client_id',
                                'value' => OrderHelper::getClientLink($order->client),
                                'format' => 'raw',
                            ],
                            [
                                'attribute' => 'status',
                                'value' => OrderHelper::statusLabel($order->status),
                                'format' => 'raw',
                            ],
                            'created_at:datetime',
                            'quantity',
                        ],
                    ]);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                } ?>
            </div>
            <div class="box-footer">
                <h4>Управление статусом товара</h4>
                <?php if ($order->isNew()){
                    echo $btnSold . $btnCanceled;
                }elseif($order->isSold()){
                    echo $btnNew . $btnCanceled;
                }elseif($order->isCanceled()){
                    echo $btnNew . $btnSold;
                } ?>
            </div>
        </div>
    </div>
</div>