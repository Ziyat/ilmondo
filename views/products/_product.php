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
                <p class="s-content__tags text-right">
                    <span class="s-content__tag-list">
                        <a href="<?= \yii\helpers\Url::to(['products/view','id' => $model->id]) ?>"> от <?php try {
                                echo Yii::$app->formatter->asCurrency($model->price); } catch (\Exception $e) {
                            } ?></a>
                    </span>
                </p>
            </div>
        </div>
    </div>

    <div class="entry__text">
        <div class="entry__header">
            <div class="entry__date">
                <a href="single-standard.html"><?= $model->category->name; ?></a>
            </div>
            <h1 class="entry__title"><?= $model->name ?></h1>
            <?= Html::a('Подробнее ...',['products/view','id' => $model->id]) ?>
        </div>
    </div>

</article>
