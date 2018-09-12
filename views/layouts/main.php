<?php

use app\assets\AppAsset;
use app\assets\HeadAppAsset;
use yii\helpers\Html;

AppAsset::register($this);
HeadAppAsset::register($this);
$this->title = 'Ювелирный магазин';
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
                    <img src="images/logo.svg" alt="Homepage">
                </a>
            </div>

            <ul class="header__social">
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

            <address class="header__info">
                Ювелирная компания <br>
                ТЦ Славянский, Никольская ул, 17, строение 1
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
                            <li><a href="category.html">История</a></li>
                            <li><a href="category.html">Философия Бренда</a></li>
                            <li><a href="category.html">Гарантии</a></li>
                            <li><a href="category.html">Сервис</a></li>
                            <li><a href="category.html">Услуги</a></li>
                            <li><a href="category.html">Партнеры</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#0" title="">Коллекции</a>
                        <ul class="sub-menu">
                            <li><a href="category.html">Lifestyle</a></li>
                            <li><a href="category.html">Health</a></li>
                            <li><a href="category.html">Family</a></li>
                            <li><a href="category.html">Management</a></li>
                            <li><a href="category.html">Travel</a></li>
                            <li><a href="category.html">Work</a></li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#0" title="">Ювелирные Изделия</a>
                        <ul class="sub-menu">
                            <li><a href="single-video.html">Video Post</a></li>
                            <li><a href="single-audio.html">Audio Post</a></li>
                            <li><a href="single-gallery.html">Gallery Post</a></li>
                            <li><a href="single-standard.html">Standard Post</a></li>
                        </ul>
                    </li>
                    <li><a href="style-guide.html" title="">Контакты</a></li>
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
                        <img src="images/slider/slide4.jpg"
                             srcset="images/slider/slide4.jpg 1x, images/slider/slide4.jpg 2x" alt="">
                    </div>
                    <div class="slider__slide">
                        <img src="images/slider/slide3.jpg"
                             srcset="images/slider/slide3.jpg 1x, images/slider/slide3.jpg 2x" alt="">
                    </div>
                    <div class="slider__slide">
                        <img src="images/slider/slide2.jpg"
                             srcset="images/slider/slide2.jpg 1x, images/slider/slide2.jpg 2x" alt="">
                    </div>
                </div>
            </div>


        </div>
    </div>

</section>


<section class="s-content">
    <div class="s-content__header col-full">
        <p class="s-content__tags">
            <span class="s-content__tag-list">
                        <a href="#0">БЕЗ КАМНЕЙ</a>
                        <a href="#0">КЛАССИКА</a>
                        <a href="#0">РОСЫПЬЮ</a>
                        <a href="#0">ДОРОЖКА</a>
                        <a href="#0">ВСЯ КОЛЛЕКЦИЯ</a>
                    </span>
        </p>
    </div>

    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>

            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <a href="single-standard.html" class="entry__thumb-link">
                    <img src="/images/magazine/mag1.jpg" alt="">
                </a>

            </article>

            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <a href="single-standard.html" class="entry__thumb-link">
                    <img src="/images/magazine/mag2.jpg" alt="">
                </a>

            </article>

            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <a href="single-standard.html" class="entry__thumb-link">
                    <img src="/images/magazine/mag4.jpg" alt="">
                </a>

            </article>

            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <a href="single-standard.html" class="entry__thumb-link">
                    <img src="/images/magazine/mag3.jpg" alt="">
                </a>

            </article>

            <div class="grid-sizer"></div>

            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <div class="entry__thumb">
                    <a href="single-standard.html" class="entry__thumb-link">
                        <img src="images/products/demo1.png" alt="">
                    </a>
                    <div class="entry__excerpt_hover">
                        <div class="entry__excerpt">
                            <p>
                                Любые уточнения к заказу (например, заменить бриллианты на изумруды, дополнить кольцо
                                фактуровкой или выполнить кольцо в золоте 750 пробы) можно внести в момент согласования
                                заказа с менеджером.
                            </p>
                            <p class="s-content__tags text-right">
                                <span class="s-content__tag-list">

                                    <a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>

                                    <a href="#cart"> от 4999 руб</a>

                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="entry__text">
                    <div class="entry__header">

                        <div class="entry__date">
                            <a href="single-standard.html">Изготовление на Заказа</a>
                        </div>
                        <h1 class="entry__title">Модель 2930</h1>

                    </div>
                </div>

            </article>
            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <div class="entry__thumb">
                    <a href="single-standard.html" class="entry__thumb-link">
                        <img src="images/products/demo2.png" alt="">
                    </a>
                    <div class="entry__excerpt_hover">
                        <div class="entry__excerpt">
                            <p>
                                Любые уточнения к заказу (например, заменить бриллианты на изумруды, дополнить кольцо
                                фактуровкой или выполнить кольцо в золоте 750 пробы) можно внести в момент согласования
                                заказа с менеджером.
                            </p>
                            <p class="s-content__tags text-right">
                                <span class="s-content__tag-list">

                                    <a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>

                                    <a href="#cart"> от 4999 руб</a>

                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="entry__text">
                    <div class="entry__header">

                        <div class="entry__date">
                            <a href="single-standard.html">Изготовление на Заказа</a>
                        </div>
                        <h1 class="entry__title">Модель 2930</h1>

                    </div>
                </div>

            </article>

        </div>
    </div>

    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <ul>
                    <li><a class="pgn__prev" href="#0">Prev</a></li>
                    <li><a class="pgn__num" href="#0">1</a></li>
                    <li><span class="pgn__num current">2</span></li>
                    <li><a class="pgn__num" href="#0">3</a></li>
                    <li><a class="pgn__num" href="#0">4</a></li>
                    <li><a class="pgn__num" href="#0">5</a></li>
                    <li><span class="pgn__num dots">…</span></li>
                    <li><a class="pgn__num" href="#0">8</a></li>
                    <li><a class="pgn__next" href="#0">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</section>


<section class="s-extra">

    <div class="row top">

        <div class="col-eight md-six tab-full popular">
            <h3>Популярные товары</h3>

            <div class="block-1-2 block-m-full popular__posts">
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/products/populate7.jpg" alt="">
                    </a>
                    <h5><a href="#0">Модель 1830D</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"> <b>от 1999 руб</b></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/products/populate2.jpg" alt="">
                    </a>
                    <h5><a href="#0">Модель 1860D</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><b>от 13999 руб</b></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/products/populate3.jpg" alt="">
                    </a>
                    <h5><a href="#0">Модель 4456</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><b>от 14999 руб</b></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/products/populate4.jpg" alt="">
                    </a>
                    <h5><a href="#0">Модель 1923</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><b>от 15999 руб</b></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/products/populate5.jpg" alt="">
                    </a>
                    <h5><a href="#0">Модель 7490</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><b>от 16999 руб</b></span>
                    </section>
                </article>
                <article class="col-block popular__post">
                    <a href="#0" class="popular__thumb">
                        <img src="images/products/populate6.jpg" alt="">
                    </a>
                    <h5><a href="#0">Модель 8764</a></h5>
                    <section class="popular__meta">
                        <span class="popular__author"><b>от 17999 руб</b></span>
                    </section>
                </article>
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

    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3>часто ищут</h3>

            <div class="tagcloud">
                <a href="#0">Обручальные Кольца</a>
                <a href="#0">Помолвочные Кольца</a>
                <a href="#0">Изготовление на Заказ</a>
                <a href="#0">Аксессуары</a>
            </div>
        </div>
    </div>

</section>


<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">

            <div class="col-two md-four mob-full s-footer__sitelinks">

                <h4>Быстрые ссылки</h4>

                <ul class="s-footer__linklist">
                    <li><a href="#0">История</a></li>
                    <li><a href="#0">Философия Бренда</a></li>
                    <li><a href="#0">Гарантии</a></li>
                    <li><a href="#0">Сервис</a></li>
                    <li><a href="#0">Услуги</a></li>
                    <li><a href="#0">Партнеры</a></li>
                </ul>

            </div>

            <div class="col-two md-four mob-full s-footer__archives">

                <h4>Архивы</h4>

                <ul class="s-footer__linklist">
                    <li><a href="#0">Январь 2018</a></li>
                    <li><a href="#0">Февраль 2018</a></li>
                    <li><a href="#0">Март 2018</a></li>
                    <li><a href="#0">Апрель 2018</a></li>
                    <li><a href="#0">Август 2018</a></li>
                    <li><a href="#0">Сентябрь 2018</a></li>
                </ul>

            </div>

            <div class="col-two md-four mob-full s-footer__social">

                <h4>Social</h4>

                <ul class="s-footer__linklist">
                    <li><a href="#0">Facebook</a></li>
                    <li><a href="#0">Instagram</a></li>
                    <li><a href="#0">Pinterest</a></li>
                </ul>

            </div>

            <div class="col-five md-full end s-footer__subscribe">

                <h4>ЗАКАЖИТЕ ОБРУЧАЛЬНЫЕ КОЛЬЦА У НАС ПРЯМО СЕЙЧАС!</h4>
                <h4>ЗВОНИТЕ: 8 (495) 799 07 07, 8 (903) 799 07 07 МЫ ЖДЕМ ВАС!</h4>

                <p>Ювелирная компания «IL mondo orafo» В настоящее время одна из лидирующих компаний в сегменте
                    производства женских и мужских обручальных и венчальных колец.</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">

                        <input type="email" value="" name="EMAIL" class="email" id="mc-email"
                               placeholder="Эл. Почта" required="">

                        <input type="submit" name="subscribe" value="Отправить">

                        <label for="mc-email" class="subscribe-message"></label>

                    </form>
                </div>

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