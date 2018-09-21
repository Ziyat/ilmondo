<?php

use app\modules\admin\entities\Client;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

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
                [
                    'attribute' => 'avatar',
                    'value' => function (Client $model) {
                        return Html::img($model->getThumbFileUrl('avatar', 'admin', Yii::getAlias('@noAvatar')));
                    },
                    'format' => 'raw'
                ],
                [
                    'attribute' => 'name',
                    'value' => function (Client $model) {
                        return Html::a($model->name . ' ' . $model->last_name, Url::to(['/admin/client/view', 'id' => $model->id]));
                    },
                    'format' => 'raw'
                ],
                'phone',
                'email:email',
            ],
        ]);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    ?>
</div>
