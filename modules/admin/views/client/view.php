<?php

use app\modules\admin\entities\Client;
use app\modules\admin\helpers\ClientHelpers;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $client app\modules\admin\entities\Client */
/* @var $model \app\modules\admin\forms\DealerAssignmentForm */

$this->title = 'Информация';
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
                            <p><?= ClientHelpers::getStatusLabel($client->status) ?></p>
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
                            <th><?= $client->getAttributeLabel('date_of_birth') ?></th>
                            <td><?= $client->date_of_birth ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <?php $form = ActiveForm::begin(); ?>

                    <?php if ($client->status == $client::STATUS_DEALER): ?>
                        <?= $form->field($model, 'clients')->dropDownList(
                            ArrayHelper::map(
                                Client::find()
                                    ->where(['status' => Client::STATUS_CLIENT])
                                    ->asArray()
                                    ->all(),
                                'id',
                                'name'),
                            [
                                'multiple' => true,
                                'options' => ArrayHelper::map($model->clients, 'id', function ($model) {
                                    return ['selected' => true];
                                })
                            ]
                        )->label('Клиенты') ?>
                    <?php elseif ($client->status == $client::STATUS_CLIENT): ?>
                        <?= $form->field($model, 'dealer')->dropDownList(
                            ArrayHelper::map(
                                Client::find()
                                    ->where(['status' => Client::STATUS_DEALER])
                                    ->asArray()
                                    ->all(),
                                'id',
                                'name')
                        )->label('Назначить диллера') ?>
                    <?php endif; ?>

                    <div class="form-group">
                        <?= Html::submitButton(' Закрепить', ['class' => 'btn btn-info btn-flat btn-block']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
