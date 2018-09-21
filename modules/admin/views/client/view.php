<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $client app\modules\admin\entities\Client */

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box">
                <div class="box-header">
                    <?= Html::a('Редактировать', ['update', 'id' => $client->id], ['class' => 'btn btn-flat btn-primary']) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $client->id], [
                        'class' => 'btn btn-danger btn-flat',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
                <div class="box-body">
                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#">
                                <?= Html::img($client->getThumbFileUrl(
                                    'avatar',
                                    'admin',
                                    Yii::getAlias('@noAvatar')),
                                    [
                                        'class' => 'img-circle media-object'
                                    ]
                                ) ?>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4><?= $client->name . ' ' . $client->last_name ?></h4>
                            <p><?= $client->params ?></p>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td><?= $client->id ?></td>
                        </tr>
                        <tr>
                            <th>Телефон</th>
                            <td><?= $client->phone ?></td>
                        </tr>
                        <tr>
                            <th>Эл. почта</th>
                            <td><?= $client->email ?></td>
                        </tr>
                        <tr>
                            <th>Адрес 1</th>
                            <td><?= $client->address_line_1 ?></td>
                        </tr>
                        <tr>
                            <th>Адрес 2</th>
                            <td><?= $client->address_line_2 ?></td>
                        </tr>
                        <tr>
                            <th>Доп. информация</th>
                            <td><?= $client->params ?></td>
                        </tr>
                        <tr>
                            <th>Дата рождения</th>
                            <td><?= $client->date_of_birth ?></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="box-footer"></div>
            </div>
        </div>
    </div>
</div>
