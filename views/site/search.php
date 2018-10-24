<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * @var yii\web\View $this
 * @var \madetec\crm\search\ProductSearch $searchModel
 */

use yii\grid\GridView;
use madetec\crm\entities\Product;
use yii\helpers\Html;
use madetec\crm\helpers\ProductHelper;

?>
<section class="s-content--narrow">

    <div class="row contact">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                Поиск
            </h1>
        </div>
        <div class="col-full">
            <?php
            try {
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => '{items}<div class="row"><div class="col-full"><nav class="pgn">{pager}</nav></div></div>',
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
                    'columns' => [

                        [
                            'value' => function (Product $model) {
                                return $model->mainPhoto ? Html::img($model->mainPhoto->getThumbFileUrl('file', 'admin')) : null;
                            },
                            'format' => 'raw',
                            'contentOptions' => ['style' => 'width: 100px'],
                        ],
                        [
                            'attribute' => 'name',
                            'value' => function (Product $model) {
                                return Html::a(Html::encode($model->name), \yii\helpers\Url::to(['products/view', 'id' => $model->id]));
                            },
                            'format' => 'raw',
                        ],
                        'article',
                        'price:currency',

                    ],
                ]);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            ?>
        </div>
    </div>
</section>

