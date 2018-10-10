<?php

use app\assets\AppAsset;
use app\assets\HeadAppAsset;
use app\modules\admin\widgets\category\Category;
use app\modules\admin\widgets\category\PopularCategory;
use app\modules\admin\widgets\product\PopularProducts;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $content
 */
AppAsset::register($this);
HeadAppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/site.webmanifest">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#115858">
    <meta name="msapplication-TileColor" content="#115858">
    <meta name="msapplication-TileImage" content="favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= $this->title ? Html::encode(Yii::$app->name . " | $this->title") : (Yii::$app->name . ' | Главная') ?></title>
    <?php $this->head() ?>
</head>
<body id="top">
<?php $this->beginBody() ?>
<section class="s-pageheader s-pageheader--home">

    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="/">
                    <img src="/images/logo.svg" alt="Homepage">
                </a>
            </div>

            <ul class="header__social">
<!--                <li>-->
<!--                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>-->
<!--                </li>-->
                <li>
                    <a href="https://www.instagram.com/ilmondoorafo.ru/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="https://vk.com/ilmondoorafo"><i class="fa fa-vk" aria-hidden="true"></i></a>
                </li>
            </ul>

            <address class="header__info">
                Ювелирная компания <br>
                ТЦ Славянский, Никольская ул, 17, строение 2
            </address>

            <a class="header__search-trigger" href="#0"></a>

            <div class="header__search">

                <form role="search" method="get" class="header__search-form" action="#">
                    <label>
                        <span class="hide-content">Поиск по:</span>
                        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s"
                               title="Поиск по:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Поиск">
                </form>

                <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

            </div>


            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            <nav class="header__nav-wrap">

                <h2 class="header__nav-heading h6">Меню</h2>

                <ul class="header__nav">
                    <li class="has-children">
                        <a href="#0" title="">Бренд</a>
                        <ul class="sub-menu">
                            <li><a href="<?= Url::to(['site/about']) ?>">О Компании</a></li>
                            <li><a href="<?= Url::to(['site/philosophy']) ?>">Философия Бренда</a></li>
                            <li><a href="<?= Url::to(['site/service']) ?>">Услуги</a></li>
                            <li><a href="<?= Url::to(['site/warranty']) ?>">Гарантии</a></li>
                            <li><a href="<?= Url::to(['site/partners']) ?>">Партнеры</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#fake" title="">Коллекции</a>
                        <ul class="sub-menu">
                            <li><a href="#fake">SPICA</a></li>
                            <li><a href="#fake">FULU</a></li>
                            <li><a href="#fake">AVIOR</a></li>
                            <li><a href="#fake">ALCOR</a></li>
                            <li><a href="#fake">MIZAR</a></li>
                            <li><a href="#fake">SITULA</a></li>
                            <li><a href="#fake">VERITATE</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#0" title="">Ювелирные Изделия</a>
                        <ul class="sub-menu">
                            <?= Category::widget(['type' => 'li']); ?>
                        </ul>
                    </li>
                    <li><a href="<?= Url::to(['site/contact']) ?>" title="">Контакты</a></li>
                </ul>

                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav>

        </div>
    </header>


    <div class="pageheader-content row">
        <div class="col-full">
            <div class="entry__thumb slider shadow">
                <div class="slider__slides">
                    <div class="slider__slide">
                        <img src="<?= Url::to(['images/slider/slide2.jpg']) ?>" alt="">
                    </div>
                    <div class="slider__slide">
                        <img src="<?= Url::to(['images/slider/slide3.jpg']) ?>" alt="">
                    </div>
                    <div class="slider__slide">
                        <img src="<?= Url::to(['images/slider/slide4.jpg']) ?>" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="s-content">
    <div class="row">
        <div class="col-full">
            <?= Alert::widget() ?>
        </div>
    </div>
    <div class="s-content__header col-full">
        <p class="s-content__tags">
            <span class="s-content__tag-list">
                <?= Category::widget(); ?>
            </span>
        </p>
    </div>
    <?= $content ?>
</section>


<section class="s-extra">

    <div class="row top">

        <div class="col-eight md-six tab-full popular">
            <h3>Популярные товары</h3>

            <div class="block-1-2 block-m-full popular__posts">
                <?= PopularProducts::widget(); ?>
            </div>
        </div>

        <div class="col-four md-six tab-full about">
            <h3>Какими могут быть обручальные кольца?</h3>

            <p>
                Ювелирная компания «IL mondo orafo» представляет вашему вниманию широкий выбор свадебных колец и колец
                для помолвки. У нас вы найдете классические парные обручальные кольца без украшений, а также ювелирные
                изделия, изготовленные в оригинальных стилях с учетом последних модных тенденций. Кроме этого, мы делаем
                обручальные кольца на заказ по индивидуальным эскизам заказчика.
            </p>

            <ul class="about__social">
                <li>
                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>

    </div>

    <?= PopularCategory::widget() ?>
</section>

<footer class="s-footer">
    <div class="socialfooter row">

        <a href="https://www.instagram.com/ilmondoorafo.ru/"><span class="fa-stack fa-lg">
                <i class="colcircle3 fa fa-circle fa-stack-2x"></i>
                <i class="colicon fa fa-instagram fa-stack-1x fa-inverse"></i>
            </span></a>

        <a href="https://vk.com/ilmondoorafo"><span class="fa-stack fa-lg">
                <i class="colcircle8 fa fa-circle fa-stack-2x"></i>
                <i class="colicon fa fa-vk fa-stack-1x fa-inverse"></i>
            </span></a>

    </div>
    <div class="s-footer__main">
        <div class="row">

            <div class="col-two md-four mob-full s-footer__sitelinks">

                <h4>Быстрые ссылки</h4>

                <ul class="s-footer__linklist">
                    <li><a href="<?= Url::to(['site/about']) ?>">О Компании</a></li>
                    <li><a href="<?= Url::to(['site/philosophy']) ?>">Философия Бренда</a></li>
                    <li><a href="<?= Url::to(['site/service']) ?>">Услуги</a></li>
                    <li><a href="<?= Url::to(['site/warranty']) ?>">Гарантии</a></li>
                    <li><a href="<?= Url::to(['site/partners']) ?>">Партнеры</a></li>
                </ul>

            </div>

            <div class="col-two md-four mob-full s-footer__archives">

                <h4>Коллекции</h4>
                <ul class="s-footer__linklist">
                    <li><a href="#fake">SPICA</a></li>
                    <li><a href="#fake">FULU</a></li>
                    <li><a href="#fake">AVIOR</a></li>
                    <li><a href="#fake">ALCOR</a></li>
                    <li><a href="#fake">MIZAR</a></li>
                    <li><a href="#fake">SITULA</a></li>
                    <li><a href="#fake">VERITATE</a></li>
                </ul>

            </div>

            <div class="col-two md-four mob-full s-footer__social">

                <h4>Ювелирные Изделия</h4>

                <ul class="s-footer__linklist">
                    <?= Category::widget(['type' => 'li']); ?>
                </ul>

            </div>

            <div class="col-five md-full end s-footer__subscribe">

                <h4>ЗАКАЖИТЕ ОБРУЧАЛЬНЫЕ КОЛЬЦА У НАС ПРЯМО СЕЙЧАС!</h4>
                <h4>ЗВОНИТЕ: 8 (495) 799 07 07, 8 (903) 799 07 07 МЫ ЖДЕМ ВАС!</h4>

                <p>Ювелирная компания «IL mondo orafo» В настоящее время одна из лидирующих компаний в сегменте
                    производства женских и мужских обручальных и венчальных колец.</p>


            </div>

        </div>
    </div>

    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright">
                    <span>© Copyright Il Mondo Orafo 2018</span>
                    <span>Разработано и поддерживается <a href="http://madetec.uz/">Madetec-Solution</a></span>
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div>

</footer>


<div id="preloader">
    <div id="loader">
        <div class="line-scale">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
