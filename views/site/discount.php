<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

/**
 * @var $discount \madetec\crm\entities\Discount
 */

$this->registerMetaTag([
    'name' => 'og:title',
    'content' => $discount->title,
], 'og:title');

$this->registerMetaTag([
    'name' => 'og:description',
    'content' => $discount->description,
], 'og:description');

$this->registerMetaTag([
    'name' => 'og:url',
    'content' => 'http://ilmondoorafo.ru/site/discount/'.$discount->slug,
], 'og:url');

$this->registerMetaTag([
    'name' => 'og:image',
    'content' => $discount->getThumbFileUrl('photo','small'),
], 'og:image');
?>
<section class="s-content--narrow">
    <div class="row">
        <h2><?= $discount->title ?></h2>
        <h3><?= $discount->description ?></h3>
        <?= $discount->text ?>
    </div>
</section>
