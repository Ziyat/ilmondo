<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\forms\OrderForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product')->dropDownList($model->getProductList(), ['prompt' => 'Выберите ...']) ?>

    <?= $form->field($model, 'client')->dropDownList($model->getClientList(), ['prompt' => 'Выберите ...']) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusList(), ['prompt' => 'Выберите ...']) ?>

    <?= $form->field($model, 'quantity')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
