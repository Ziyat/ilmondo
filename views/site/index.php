<?php

/**
 * @var $this yii\web\View
 * @var $products madetec\crm\entities\Product
 */

use yii\widgets\ListView;

$this->title = 'Ювелирный магазин';

?>

<div class="row masonry-wrap">
    <div class="masonry">
        <div class="grid-sizer"></div>

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

