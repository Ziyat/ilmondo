<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\search\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">


    <p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-flat btn-success']) ?>
    </p>

    <?php
    try {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'last_name',
                'address_line_1',
                'address_line_2',
                //'date_of_birth',
                //'phone',
                //'email:email',
                //'params:ntext',
                //'avatar',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    ?>
</div>
