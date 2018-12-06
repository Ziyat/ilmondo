<?php

/**
 * @var $this yii\web\View
 * @var $products madetec\crm\entities\Product
 */

use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = 'Ювелирный магазин';

?>
<div class="row masonry-wrap">
    <div class="masonry">
        <article class="masonry__brick entry format-standard" data-aos="fade-up">
            <a class="entry__thumb-link" href="<?= Url::to(['/site/service']) ?>">
                <img src="/images/thumbs/banners/500х864-sait-00887.jpg" alt="">
            </a>
        </article>
        <article class="masonry__brick entry format-standard" data-aos="fade-up">
            <a class="entry__thumb-link" href="<?= Url::to(['/products/vsa-kollekcia']) ?>">
                <img src="/images/thumbs/banners/500х400-katalog-il.jpg" alt="">
            </a>
        </article>
        <article class="masonry__brick entry format-standard" data-aos="fade-up">
            <a class="entry__thumb-link" href="<?= Url::to(['products/pomolvocnye']) ?>">
                <img src="/images/thumbs/banners/500x864-Veritate.jpg" alt="">
            </a>
        </article>
        <article class="masonry__brick entry format-standard" data-aos="fade-up">
            <a class="entry__thumb-link" href="<?= Url::to(['/site/warranty']) ?>">
                <img src="/images/thumbs/banners/500х400-varranty-il.jpg" alt="">
            </a>
        </article>

        <?= \app\widgets\discounts\DiscountWidget::widget(); ?>

        <div class="grid-sizer"></div>
        <?php

        try {
            echo ListView::widget([
                'dataProvider' => $products,
                'itemView' => '../products/_product',
                'layout' => '{items}</div></div><div class="row"><div class="col-full"><nav class="pgn">{pager}</nav></div></div>',
                'options' => [
                    'tag' => false,
                ],
                'itemOptions' => [
                    'tag' => false,
                ],
                'emptyText' => 'Список пуст',
                'emptyTextOptions' => [
                    'tag' => 'p'
                ],
                'pager' => [
                    'options' => [
                        'tag' => 'ul',
                        'class' => false,
                        'id' => false,
                    ],
                    'activePageCssClass' => 'current',
                    'disabledPageCssClass' => 'inactive',
                    'pageCssClass' => 'pgn__num',
                    'prevPageCssClass' => 'pgn__prev',
                    'nextPageCssClass' => 'pgn__next',
                ],
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        ?>

