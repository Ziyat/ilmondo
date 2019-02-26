<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * @var $this \yii\web\View
 */
$this->title = 'Услуги';
?>
    <div class="row service">
        <h1>Услуги: Салона</h1>
        <h2>Изготовление ювелирных изделий на заказ</h2>
        <hr style="width: 100%; border: 1px solid #ddd;">
        <h2>Создай свое ювелирное украшение!</h2>
        <h2>Порядок изготовления ювелирного изделия</h2>
        <h2>Методы изготовления:</h2>
        <?php foreach ($data as $item): ?>
            <div class="col-four">
                <div class="flex">
                    <div class="card">
                        <div class="header-card" style="background-image: url(<?= $item->image ?>)">
                        </div>
                        <div class="content">
                            <div class="articlemeta">
                            </div>
                            <div class="closebar">
                                <a href="#0" class="closebttn"><i class="fa fa-close"></i></a>
                            </div>
                            <p><?= $item->text ?></p>
                            <a href="#0" class="readmore"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-six block-mob-full">
            <img src="/images/services/services_11.jpg" style="margin: 10px 0" class="img-responsive">
            <img src="/images/services/services_5.jpg" style="margin: 10px 0" class="img-responsive">
        </div>
        <div class="col-six block-mob-full">
            <div class="features-list">
                <h3>Мы выполняем все виды работ по <br> ремонту <br> ювелирных изделий:</h3>
                <ul class="no-circle">
                    <li class="li"><i class="fa fa-check text-success"></i> Лазерная пайка (производится при Вас)
                    </li>
                    <li class="li">
                        <i class="fa fa-check text-success"></i> Востановление покрытий (производится при Вас):
                        <ul class="no-circle">
                            <li class="li"><i class="fa fa-check text-success"></i> родирование - белое, черное</li>
                            <li class="li"><i class="fa fa-check text-success"></i> золочение - желтое</li>
                        </ul>
                    </li>
                    <li class="li">
                        <i class="fa fa-check text-success"></i> Граверные работы:
                        <ul class="no-circle">
                            <li class="li"><i class="fa fa-check text-success"></i> Лазерная гравировка</li>
                            <li class="li"><i class="fa fa-check text-success"></i> Ручная гравировка</li>
                        </ul>
                    </li>
                    <li class="li"><i class="fa fa-check text-success"></i> Изменение размера кольца</li>
                    <li class="li"><i class="fa fa-check text-success"></i> Ремонт цепочек</li>
                    <li class="li"><i class="fa fa-check text-success"></i> Ремонт и замена замка</li>
                </ul>
            </div> <!-- .features-list -->
        </div>
        <div class="clearfix"></div>
        <div class="col-six block-mob-full">
            <div class="features-list">
                <ul class="no-circle">
                    <li class="li"><i class="fa fa-check text-success"></i> Ультразвуковая чистка</li>
                    <li class="li"><i class="fa fa-check text-success"></i> Полировка изделий и корпусов</li>
                    <li class="li"><i class="fa fa-check text-success"></i> Закрепка камней</li>
                    <li class="li"><i class="fa fa-check text-success"></i> Огранка камней</li>
                    <li class="li"><i class="fa fa-check text-success"></i> Ювелирная эмаль</li>
                    <li class="li"><i class="fa fa-check text-success"></i> Заказ драгоценных и полудрагоценных
                        камней
                        (по
                        огранке, по качеству)
                    </li>
                    <li class="li"><i class="fa fa-check text-success"></i> Восстановление утерянного, парного
                        украшения
                    </li>
                    <li class="li"><i class="fa fa-check text-success"></i> Реставрация старинных колец и часов</li>
                    <li class="li"><i class="fa fa-check text-success"></i> Заказ драгоценных и полудрагоценных
                        камней
                        (по огранке, по качеству)
                    </li>
                </ul>
            </div> <!-- .features-list -->
        </div>
        <div class="col-six block-mob-full">
            <img src="/images/services/services_4.jpg" style="margin: 10px 0" class="img-responsive">
            <img src="/images/services/services_3.jpg" style="margin: 10px 0" class="img-responsive">
        </div>

    </div>
<?php

$js = <<<JS
$('.readmore').click(function() {
  $(this).parent(".content").toggleClass('full');
  $(this).parent().prev('.header-card').toggleClass('collapse');
  $('.readmore').toggle();
});
$('.closebttn').click(function() {
  $(this).parent().parent('.content').removeClass('full');
  $(this).parent().parent().prev('.header-card').removeClass('collapse');
  $('.readmore').toggle();
});
JS;

$this->registerJs($js);

