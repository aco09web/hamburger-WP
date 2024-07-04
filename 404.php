<?php get_header(); ?>
<main class="l-main">

    <div class="p-frontHero">

        <?php
        if (is_active_acf()) : //ACFプラグインが有効になっている場合
            // ページスラッグからIDを取得
            //カスタム投稿タイプ（投稿タイプ：parts）
            $post_type = 'parts';
            $data      = get_page_by_path('mainvisual', OBJECT, $post_type);
            $post_id   = $data->ID;
        ?>
            <?php if (get_field('hero-img', $post_id)) : // 画像がカスタムフィールドにある場合
            ?>
                <img class="p-frontHero__image" src="<?php
                                                        the_field('hero-img', $post_id);
                                                        ?>" alt=””>
            <?php else : // 画像がカスタムフィールドにない場合
            ?>
                <img class="p-frontHero__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero_01.webp" alt=”hamburger”>
            <?php endif; ?>
        <?php else : //ACFプラグインが無効の場合
        ?>
            <img class="p-frontHero__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero_01.webp" alt=”hamburger”>
        <?php endif; ?>
        <h1 class=" p-frontHero__title c-text--bold c-text--white">
            <?php
            $post_type = 'parts';
            $data      = get_page_by_path('mainvisual', OBJECT, $post_type); //メインビジュアルのカスタム投稿のタイトルを取得
            $post_tit   = $data->post_title;
            if (empty($post_tit)) : //タイトルが空（未入力）の場合の処理
            ?>
                <?php echo 'タイトルの入力がありません。' . "\n" ?>
            <?php else : //タイトルが空（未入力）ではない場合の処理
            ?>
                <?php //カスタム投稿タイプ（投稿タイプ：parts）
                $post_type = 'parts';
                $data      = get_page_by_path('mainvisual', OBJECT, $post_type);
                $post_id   = $data->ID;
                $title = get_the_title($post_id);
                echo $title; //メインビジュアルのカスタム投稿のタイトルを出力
                ?>
            <?php endif; ?>
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

<?php get_footer(); ?>