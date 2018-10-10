<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * @var \app\modules\admin\entities\Product $product
 * @var \yii\web\View $this
 */

use yii\helpers\Html;

$this->title = $product->name;
?>

<div class="row productColFull">
    <div class="col-six">
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

    <div class="pokupka col-six">
        <h1><?= $product->name ?></h1>
        <div class="par">
            <p>В наличии</p>
            <p>Артикул: <?= $product->article ?></p>
        </div>
        <div class="price">
            <h2>от <?= Yii::$app->formatter->asCurrency($product->price) ?></h2>
            <h3>от <?= Yii::$app->formatter->asCurrency($product->old_price) ?></h3>
        </div>
<!--        <div class="buttonproduct">-->
<!--            <button class="kupit">Заказать</button>-->
<!--        </div>-->
        <hr>
        <div class="opisan">
            <h3>Дополнительные параметры:</h3>
            <?= Html::decode($product->params) ?>
        </div>
    </div>
</div>