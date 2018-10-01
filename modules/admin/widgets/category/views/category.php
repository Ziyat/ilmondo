<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * @var $categories \app\modules\admin\entities\Category[]
 * @var $type
 */

use yii\helpers\Html;


foreach ($categories as $category) {
    if ($type && $type == 'li') {
        echo Html::tag('li', Html::a($category->name, ['products/category', 'slug' => $category->slug]));
    } else {
        echo Html::a($category->name, ['products/category', 'slug' => $category->slug]);
    }
}
?>


