<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

/**
 * @var $discounts \madetec\crm\entities\Discount[]
 */

use yii\helpers\Html;
use yii\helpers\Url;

foreach ($discounts as $discount) {
    echo Html::tag(
        'article',
        Html::a(
            Html::img($discount->getThumbFileUrl('photo', 'small')),
            Url::to(['site/discount', 'slug' => $discount->slug]),
            [
                'class' => 'entry__thumb-link'
            ]
        ),
        [
            'class' => 'masonry__brick entry format-standard',
            'data-aos' => 'fade-up'
        ]);
}

