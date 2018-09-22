<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
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

        <div>
            <h4>Москва,ТЦ "Славянский" Никольская улица.<br />
                Дом 17 строение 1 , офис 109 ,этаж 1</h4>
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
            <form name="cForm" id="cForm" method="post" action="">
                <fieldset>

                    <div class="form-field">
                        <input name="cName" type="text" id="cName" class="full-width" placeholder="Your Name" value="">
                    </div>

                    <div class="form-field">
                        <input name="cEmail" type="text" id="cEmail" class="full-width" placeholder="Your Email" value="">
                    </div>

                    <div class="form-field">
                        <input name="cWebsite" type="text" id="cWebsite" class="full-width" placeholder="Website"  value="">
                    </div>

                    <div class="message form-field">
                        <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message" ></textarea>
                    </div>

                    <button type="submit" class="submit btn btn--primary full-width">Submit</button>

                </fieldset>
            </form> <!-- end form -->


        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->
