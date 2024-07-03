<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">
    <div class="p-frontHero">
        <img class="p-frontHero__image" src="<?php the_field("hero-img", 223); //メインビジュアルのカスタム投稿の画像を出力
                                                ?>" alt=””>
        <h1 class=" p-frontHero__title c-text--bold c-text--white"><?php $title = get_the_title(223);
                                                                    echo $title; //メインビジュアルのカスタム投稿のタイトルを出力
                                                                    ?></h1>
    </div>
    <div class="p-contents">
        <div class="u-mg-bottom--primary">
            <p>404 NOT FOUND</p>
            <p>お探しのページは見つかりませんでした</p>
        </div>
    </div>



</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>

<?php get_footer(); ?> <!--footer.phpを読み込むテンプレートタグ（インクルードタグ）-->