<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RaiseTechの課題サイトです。">
    <title>RaiseTech（レイズテック） | ハンバーガーサイト</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel=”icon” href=“/favicon.ico”>
    <script defer src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script defer src="./js/main.js"></script>
    </head>

<body>
<div class="c-wrapper">
<div class="c-container">
<header class="l-header p-header c-bg-color--salmon-pink">
    <p class="c-title--logo c-text--bold c-text--gray--primary"><a href="#">Hamburger</a></p>
    <form class="p-search--form" action="/" method="get">
        <label class="p-search__label" for="header-search">検索</label>
        <p class="p-search--box c-bg-color--white"><input id="header-search" type="text" name="header-search" placeholder="チーズバーガー"></p>
        <p><button class="p-search--submit c-text--bold c-text--gray--primary" type="submit">検索</button></p>
    </form>
    <a href="#" class="p-header__button--menu c-text--bold c-text--gray--primary c-font--title">Menu</a>
</header>
<main class="l-main">
    <section class="p-archive--Hero c-bg-color--black">
    <h1 class="p-archive__title c-text--bold c-text--white c-font--title">Search:<span class="p-archive__title--text c-text--white c-text--bold c-font--primary c-font-size--primary">チーズバーガー</span></h1>
            <!--<picture class="p-archive__image">
                <source srcset="../images/archive-top-sp.webp" media="(max-width: 834px)" type="image/webp">
                <source srcset="../images/archive-top-tab.webp" media="(max-width: 1200px)" type="image/webp">
                <img src="../images/archive-top-pc.webp" alt=”hamburger”>
            </picture>-->
            <figure><img class="p-archive__image" src="../images/archive-top-pc.webp" alt=”hamburger”></figure>
    </section>

    <section class="c-section--container--primary">
        <h2 class="c-section__heading2 c-text--bold">小見出しが入ります</h2>
        <p class="c-section__text">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
        <article class="p-card">
            <div class="p-card__body">
                <figure class="p-card__image--container"><img class="p-card__image" src="./images/article_01.webp" alt="hamburger"></figure>
                <div class="p-card__text--body">
                <h3 class="p-card__title c-text--bold c-text--white">チーズバーガー</h3>
                    <p class="p-card__subtitle c-text--bold c-text--white">小見出しが入ります</p>
                    <p class="p-card__text c-text--white c-font-size--primar">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                    <div class="p-card__link--container"><a href="#" class="p-card__link c-text--bold c-bg-color--white c-text--gray--primary">詳しく見る</a></div>
                </div>
            </div>
        </article>
                <article class="p-card">
            <div class="p-card__body">
                <figure class="p-card__image--container"><img class="p-card__image" src="./images/hero_01.webp" alt="hamburger"></figure>
                <div class="p-card__text--body">
                <h3 class="p-card__title c-text--bold c-text--white">ダブルチーズバーガー</h3>
                    <p class="p-card__subtitle c-text--bold c-text--white">小見出しが入ります</p>
                    <p class="p-card__text c-text--white c-font-size--primar">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                    <div class="p-card__link--container"><a href="#" class="p-card__link c-text--bold c-bg-color--white c-text--gray--primary">詳しく見る</a></div>
                </div>
            </div>
        </article>
                <article class="p-card">
            <div class="p-card__body">
                <figure class="p-card__image--container"><img class="p-card__image" src="./images/article_02.webp" alt="hamburger"></figure>
                <div class="p-card__text--body">
                <h3 class="p-card__title c-text--bold c-text--white">スペシャルチーズバーガー</h3>
                    <p class="p-card__subtitle c-text--bold c-text--white">小見出しが入ります</p>
                    <p class="p-card__text c-text--white c-font-size--primar">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                    <div class="p-card__link--container"><a href="#" class="p-card__link c-text--bold c-bg-color--white c-text--gray--primary">詳しく見る</a></div>
                </div>
            </div>
        </article>
    </section>
    <div class="p-pagination--pc c-text--gray--primary c-font--title">
        <p class="p-pagination__text c-text--bold">page 1/10</p>
        <ul class="p-pagination__list">
            <li><a class="p-pagination__list__link p-pagination__link--current c-text--bold p-pagination__arrow-prev u-mg-left0" href="#">1</a></li>
            <li><a class="p-pagination__list__link c-text--bold" href="#">2</a></li>
            <li><a class="p-pagination__list__link c-text--bold" href="#">3</a></li>
            <li><a class="p-pagination__list__link c-text--bold" href="#">4</a></li>
            <li><a class="p-pagination__list__link c-text--bold" href="#">5</a></li>
            <li><a class="p-pagination__list__link c-text--bold" href="#">6</a></li>
            <li><a class="p-pagination__list__link c-text--bold" href="#">7</a></li>
            <li><a class="p-pagination__list__link c-text--bold" href="#">8</a></li>
            <li><a class="p-pagination__list__link c-text--bold p-pagination__arrow-next" href="#">9</a></li>
        </ul>
    </div>
    <div class="p-pagination--sp c-font-size--primary">
        <a class="p-pagination__prev" href="#">前へ</a>
        <a class="p-pagination__next" href="#">次へ</a>
    </div>
</main>
</div>
<div class="l-sidebar p-sidebar c-bg-color--gray">
    <nav class="p-menu c-bg-color--gray">
        <p class="p-menu__title c-text--bold c-text--gray--primary c-font--title">Menu</p>
        <a href="#" class="p-nav__btn--close"><span class="p-nav__btn--close__text">メニューを閉じる</span></a>
        <ul class="p-menu__listBox c-text--gray--primary">
            <li><a class="p-menu__list c-text--bold" href="#">バーガー</a>
                <ul class="p-menu__subListBox">
                    <li class="p-menu__subList"><a href="#">ハンバーガー</a></li>
                    <li class="p-menu__subList"><a href="#">チーズバーカー</a></li>
                    <li class="p-menu__subList"><a href="#">テリヤキバーガー</a></li>
                    <li class="p-menu__subList"><a href="#">アボカドバーガー</a></li>
                    <li class="p-menu__subList"><a href="#">フィッシュバーガー</a></li>
                    <li class="p-menu__subList"><a href="#">ベーコンバーガー</a></li>
                    <li class="p-menu__subList"><a href="#">チキンバーガー</a></li>
                </ul></li>
            <li><a class="p-menu__list c-text--bold" href="#">サイド</a>
                <ul class="p-menu__subListBox">
                    <li class="p-menu__subList"><a href="#">ポテト</a></li>
                    <li class="p-menu__subList"><a href="#">サラダ</a></li>
                    <li class="p-menu__subList"><a href="#">ナゲット</a></li>
                    <li class="p-menu__subList"><a href="#">コーン</a></li>
                </ul></li>
            <li><a class="p-menu__list c-text--bold" href="#">ドリンク</a>
                <ul class="p-menu__subListBox">
                    <li class="p-menu__subList"><a href="#">コーラ</a></li>
                    <li class="p-menu__subList"><a href="#">ファンタ</a></li>
                    <li class="p-menu__subList"><a href="#">オレンジ</a></li>
                    <li class="p-menu__subList"><a href="#">アップル</a></li>
                    <li class="p-menu__subList"><a href="#">紅茶（Ice/Hot）</a></li>
                    <li class="p-menu__subList"><a href="#">コーヒー（Ice/Hot）</a></li>
                </ul></li>
        </ul>
    </nav>
</div>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>

<footer class="l-footer p-footer">
    <ul class="p-footer__listBox c-text--white">
        <li class="p-footer__list"><a href="#">ショップ情報</a></li>
        <li class="p-footer__list"><a href="#">ヒストリー</a></li>
    </ul>
    <small class="p-footer__copyright c-text--white">Copyright: RaiseTech</small>
</footer>
</body>
</html>