<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * @var \app\modules\admin\entities\Product $model
 */

use yii\helpers\Html;
use yii\helpers\StringHelper;

?>

<article class="masonry__brick entry format-standard" data-aos="fade-up">
    <div class="entry__thumb">
        <a href="single-standard.html" class="entry__thumb-link">
            <img src="<?= $model->mainPhoto ? $model->mainPhoto->getThumbFileUrl('file', 'large') : null; ?>" alt="">
        </a>
        <div class="entry__excerpt_hover">
            <div class="entry__excerpt">
                <p>
                    <?= StringHelper::truncateWords(Html::decode($model->params), 40) ?>
                </p>
            </div>
        </div>
    </div>

    <div class="entry__text">
        <div class="entry__header">
            <div class="entry__date">
                <?= Html::a($model->category->name, ['products/category', 'slug' => $model->category->slug]) ?>
            </div>
            <h1 class="entry__title"><?= $model->name ?></h1>
            <div class="entry__excerpt">
                <p>
                    от <?= Yii::$app->formatter->asCurrency($model->price) ?>
                </p>
            </div>
        </div>

    </div>
        <?= Html::a('Подробнее ...', ['products/view', 'id' => $model->id],['class' => 'entry__button']) ?>
</article>
