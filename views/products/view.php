<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * @var madetec\crm\entities\Product $product
 * @var app\forms\PreOrderForm $model
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $product->name;
?>

<div class="row productColFull">
    <div class="col-five align-center">
        <div class="slider productsSliderFor">
            <?php
            foreach ($product->photos as $photo) {
                echo Html::img($photo->getThumbFileUrl('file','large'));
            }
            ?>
        </div>
        <div class="slider productsSliderNav ">
            <?php
            foreach ($product->photos as $photo) {
                echo Html::img($photo->getThumbFileUrl('file','thumb'));
            }
            ?>
        </div>
    </div>

    <div class="pokupka col-seven">
        <h1><?= $product->name ?></h1>
        <div class="par">
            <p>В наличии</p>
            <p>Артикул: <?= $product->article ?></p>
        </div>
        <div class="price">
            <h2>от <?= Yii::$app->formatter->asCurrency($product->price) ?></h2>
            <h3>от <?= Yii::$app->formatter->asCurrency($product->old_price) ?></h3>
        </div>
        <button id="preOrder"><i class="fa fa-shopping-cart"></i> Заказать</button>
        <div id="formContainer" style="display: none;">
            <hr>
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Имя', 'class' => 'full-width'])->label(false); ?>
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Телефон', 'class' => 'full-width'])->label(false); ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Эл. почта', 'class' => 'full-width', 'type' => 'email', 'min' => '1', 'max' => '10'])->label(false); ?>
            <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder' => 'Адрес', 'class' => 'full-width'])->label(false); ?>
            <?= $form->field($model, 'quantity')->textInput(['maxlength' => true, 'placeholder' => 'Количество', 'class' => 'full-width', 'type' => 'number'])->label(false); ?>
            <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::class, [
                'template' => '<div class="row"><div class="col-four">{image}</div><div class="col-eight">{input}</div></div>',
                'options' => ['placeholder' => 'введите код с картинки']
            ])->label(false) ?>
            <?= Html::submitButton('Отправить', ['class' => 'submit btn--primary btn--large full-width']) ?>
            <?php ActiveForm::end(); ?>
        </div>
        <hr>
        <div class="opisan">
            <h3>Дополнительные параметры:</h3>
            <?= Html::decode($product->params) ?>
        </div>

    </div>
</div>

<?php

$script = <<<JS
    $('#preorderform-phone').inputmask("+7 (999) 999-99-99");
    var orderContainer = $('.pokupka');
     orderContainer.on('click','#preOrder', function(){
        $('#formContainer').toggle(200);
    })
JS;


$this->registerJs($script);