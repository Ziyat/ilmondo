<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

/**
 * @var string[] $files
 */

use yii\helpers\Html;

echo Html::beginTag('div', ['class' => 'entry__thumb slider shadow']);
echo Html::beginTag('div', ['class' => 'slider__slides']);
foreach ($files as $file) {
    echo Html::beginTag('div', ['class' => 'slider__slide']);
    echo Html::img($file);
    echo Html::endTag('div');
}
echo Html::endTag('div');
echo Html::endTag('div');

