<?php get_header(); ?>
<main class="l-main">
    <div class="p-frontHero">
        <?php
        $mainvisual_args = [
            'post_type' => 'mainvisual', // カスタム投稿名が「mainvisual」の場合
            'posts_per_page' => 1, // 表示する数
        ];
        $mainvisual_posts = get_posts($mainvisual_args); ?>

        <?php if ($mainvisual_posts) : foreach ($mainvisual_posts as $post) : setup_postdata($post); // 投稿がある場合 ▽ ループ開始 ▽
        ?>
                <?php
                if (is_active_acf()) : //ACFプラグインが有効になっている場合
                    // ページスラッグからIDを取得
                    //カスタム投稿タイプ（投稿タイプ：mainvisual）
                    $post_type = 'mainvisual';
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

            <?php endforeach; ?>
        <?php else : // 記事がない場合 
        ?>
            <h1 class="p-frontHero__title c-text--bold c-text--white"><?php echo esc_attr_e('Site Title', 'hamburger'); ?></h1>
            <img class="p-frontHero__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero_01.webp" alt=”hamburger”>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>
    <div class="p-contents">
        <div class="u-mg-bottom--primary">
            <p>404 NOT FOUND</p>
            <p><?php echo esc_attr_e('The page you are looking for could not be found.', 'hamburger'); ?></p>
        </div>
    </div>



</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>

<?php get_footer(); ?>