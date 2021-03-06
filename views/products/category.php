<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * @var $products \app\modules\admin\entities\Product
 * @var $category \app\modules\admin\entities\Category
 */

use yii\widgets\ListView;

$this->title = $category->name;

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
        'emptyText' => 'Список пуст',
        'emptyTextOptions' => [
            'tag' => 'h4',
            'class' => 'text-center'
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