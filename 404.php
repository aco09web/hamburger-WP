<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">
    <div class="p-frontHero">
        <img class="p-frontHero__image" src="<?php
                                                // ページスラッグからIDを取得
                                                //カスタム投稿タイプ（投稿タイプ：parts）
                                                $post_type = 'parts';
                                                $data      = get_page_by_path('mainvisual', OBJECT, $post_type);
                                                $post_id   = $data->ID;
                                                the_field("hero-img", $post_id); //メインビジュアルのカスタム投稿の画像を出力
                                                ?>" alt=””>
        <h1 class=" p-frontHero__title c-text--bold c-text--white"><?php //カスタム投稿タイプ（投稿タイプ：parts）
                                                                    $post_type = 'parts';
                                                                    $data      = get_page_by_path('mainvisual', OBJECT, $post_type);
                                                                    $post_id   = $data->ID;
                                                                    $title = get_the_title($post_id);
                                                                    echo $title; //メインビジュアルのカスタム投稿のタイトルを出力
                                                                    ?>

        </h1>
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