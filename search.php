<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">
    <section class="p-archive--Hero c-bg-color--black">
        <h1 class="p-archive__title c-text--bold c-text--white c-font--title">Search:<span class="p-archive__title--text c-text--white c-text--bold c-font--primary c-font-size--primary">チーズバーガー</span></h1>
        <!--<picture class="p-archive__image">
                <source srcset="../images/archive-top-sp.webp" media="(max-width: 834px)" type="image/webp">
                <source srcset="../images/archive-top-tab.webp" media="(max-width: 1200px)" type="image/webp">
                <img src="../images/archive-top-pc.webp" alt=”hamburger”>
            </picture>-->
        <figure><img class="p-archive__image" src="<?php echo get_template_directory_uri(); ?>/images/archive-top-pc.webp" alt=”hamburger”></figure>
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

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
        // 投稿の表示
        endwhile;
    endif;
    wp_pagenavi();
    ?>

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
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>
<?php get_footer(); ?> <!--footer.phpを読み込むテンプレートタグ（インクルードタグ）-->