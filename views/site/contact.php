<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<section class="s-content--narrow">

    <div class="row contact">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                Контакты
            </h1>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div id="map" style="width: 100%; height: 400px"></div>
        </div> <!-- end s-content__media -->

        <div class="col-six">
            <h4>Москва,ТЦ "Славянский" Никольская улица.<br />
                Дом 17 строение 2 , офис 7</h4>
            <p>м. Лубянка<br /> м. Площадь Революции<br />м. Театральная<br />м. Охотный Ряд</p>
            <hr>
            <p>Все интересующие Вас вопросы по заказу обручальных колец Вы можете задать по телефонам:</p>
            <a href="#">Тел. 8 (495) 799 07 07<br /></a>
            <a href="#">Тел. 8 (903) 799 07 07<br /></a>
            <a href="#">Тел. 8 (499) 130 54 28<br /></a>
            <a href="#">Тел. 8 (903) 130 54 28<br /></a>
            <a href="#">Тел. 8 (499) 344 04 00<br /></a>
            <h5  class="inline">Email:</h5>
            <a href="#">didiamonds@mail.ru</a>
            <h4>Режим работы:</h4>
            <p>Ежедневно с 10:00 до 20:00 без обеда.</p>


        </div> <!-- end s-content__main -->
        <div class="col-six">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Имя','class' => 'full-width'])->label(false); ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Эл. почта','class' => 'full-width'])->label(false); ?>
            <?= $form->field($model, 'subject')->textInput(['maxlength' => true, 'placeholder' => 'тема','class' => 'full-width'])->label(false); ?>
            <?= $form->field($model, 'body')->textInput(['maxlength' => true, 'placeholder' => 'сообщение','class' => 'full-width'])->label(false); ?>
            <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::class, [
                'template' => '<div class="row"><div class="col-four">{image}</div><div class="col-eight">{input}</div></div>',
                'options' => ['placeholder' => 'введите код с картинки']
            ])->label(false) ?>
            <?= Html::submitButton('Отправить', ['class' => 'submit btn--primary btn--large full-width']) ?>
            <?php ActiveForm::end(); ?>
        </div>

    </div> <!-- end row -->

</section> <!-- s-content -->


<?php

$scriptYandexMap = <<<JS
ymaps.ready(init);
    function init(){
        var myMap = new ymaps.Map("map", {
            center: [55.75779906898193,37.623015999999964],
            zoom: 16
        });

        var myPlacemark = new ymaps.Placemark([55.75779906898193,37.623015999999964], {
            hintContent: '',
            balloonContent: ''
        });

        myMap.geoObjects.add(myPlacemark);
    }
JS;
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');

$this->registerJs($scriptYandexMap);

