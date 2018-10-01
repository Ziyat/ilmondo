<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * @var \yii\web\View $this
 * @var \app\modules\admin\entities\Product $products
 */

use yii\widgets\ListView;

$this->title = 'Товары';


try {
    echo ListView::widget([
        'dataProvider' => $products,
        'itemView' => '_product',
        'layout' => '<div class="row masonry-wrap"><div class="masonry">{items}</div></div><div class="row"><div class="col-full"><nav class="pgn">{pager}</nav></div></div>',
        'options' => [
            'tag' => false,
        ],
        'itemOptions' => [
            'tag' => false,
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
