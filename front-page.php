<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">
    <div class="p-frontHero">
        <?php if (get_field('hero-img')) : // 画像がカスタムフィールドにある場合
        ?>
            <img class="p-frontHero__image" src="<?php
                                                    // ページスラッグからIDを取得
                                                    //カスタム投稿タイプ（投稿タイプ：parts）
                                                    $post_type = 'parts';
                                                    $data      = get_page_by_path('mainvisual', OBJECT, $post_type);
                                                    $post_id   = $data->ID;
                                                    the_field("hero-img", $post_id); //メインビジュアルのカスタム投稿の画像を出力
                                                    ?>" alt=””>
        <?php else : // 画像がカスタムフィールドにない場合
        ?>
            <img class="p-frontHero__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero_01.webp" alt=”hamburger”>
        <?php endif; ?>
        <h1 class=" p-frontHero__title c-text--bold c-text--white">
            <?php
            $post_type = 'parts';
            $data      = get_page_by_path('mainvisual', OBJECT, $post_type); //メインビジュアルのカスタム投稿のタイトルを取得
            $post_tit   = $data->post_title;
            if (empty($post_tit)) : ?>
                <!-- タイトルが空（未入力）の場合の処理 -->
                <?php echo 'タイトルの入力がありません。' . "\n" ?>
            <?php else : ?>
                <!-- タイトルが空（未入力）ではない場合の処理 -->
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
        <dl class="p-contents__list p-contents__list__takeOut">
            <dt class="p-contents__title c-text--gray--secondary c-text--bold c-font--title">Take Out</dt>

            <?php
            $takeout_args = [
                'post_type' => 'takeout', // カスタム投稿名が「takeout」の場合
                'posts_per_page' => 2, // 表示する数
            ];
            $takeout_posts = get_posts($takeout_args); ?>

            <?php if ($takeout_posts) : foreach ($takeout_posts as $post) : setup_postdata($post); // 投稿がある場合 
            ?>

                    <!-- ▽ ループ開始 ▽ -->

                    <dd class="p-contents__text">
                        <a href='<?php echo esc_url(get_term_link('take-out-cat', 'takeout-eatin-cat')); ?>'>

                            <p class="p-contents__subTitle c-text--bold c-font--title"><?php the_title(); ?></p>
                            <p class="p-contents__subText"><?php if (isset($content)) $content = esc_html(get_the_content()); ?>
                                <?php
                                if (isset($content)) {
                                    // HTMLタグの除去
                                    $content = strip_tags($content);
                                    echo $content();
                                } ?>
                                <?php the_content(); ?></p>
                        </a>

                    </dd>

                    <!-- △ ループ終了 △ -->

                <?php endforeach; ?>

            <?php else : // 記事がない場合 
            ?>

                <li>まだ投稿がありません。</li>

            <?php endif;
            wp_reset_postdata(); ?>
        </dl>
        <dl class="p-contents__list p-contents__list__eatIn">
            <dt class="p-contents__title c-text--white c-text--bold">Eat In</dt>

            <?php
            $takeout_args = [
                'post_type' => 'eatin', // カスタム投稿名が「eatin」の場合
                'posts_per_page' => 2, // 表示する数
            ];
            $takeout_posts = get_posts($takeout_args); ?>

            <?php if ($takeout_posts) : foreach ($takeout_posts as $post) : setup_postdata($post); // 投稿がある場合 
            ?>

                    <!-- ▽ ループ開始 ▽ -->

                    <dd class="p-contents__text">

                        <a href='<?php echo esc_url(get_term_link('eat-in-cat', 'takeout-eatin-cat')); ?>'>

                            <p class="p-contents__subTitle c-text--bold c-font--title"><?php the_title(); ?></p>
                            <p class="p-contents__subText"><?php if (isset($content)) $content = esc_html(get_the_content()); ?>
                                <?php
                                if (isset($content)) {
                                    // HTMLタグの除去
                                    $content = strip_tags($content);
                                    echo $content();
                                } ?>
                                <?php the_content(); ?></p>
                        </a>

                    </dd>

                    <!-- △ ループ終了 △ -->

                <?php endforeach; ?>

            <?php else : // 記事がない場合 
            ?>

                <li>まだ投稿がありません。</li>

            <?php endif;
            wp_reset_postdata(); ?>

        </dl>
    </div>
    </dl>

    <div class="p-access">
        <div class="p-access__wrapper">
            <div class="p-access__contents">
                <h2 class="p-access__title c-text--bold c-text--white">
                    <?php
                    $post_type = 'parts';
                    $data      = get_page_by_path('access', OBJECT, $post_type); //アクセス情報記事のタイトルを取得
                    $post_tit   = $data->post_title;
                    if (empty($post_tit)) : ?>
                        <!-- タイトルが空（未入力）の場合の処理 -->
                        <?php echo 'タイトルの入力がありません。' . "\n" ?>
                    <?php else : ?>
                        <!-- タイトルが空（未入力）ではない場合の処理 -->
                        <?php //カスタム投稿タイプ（投稿タイプ：parts）
                        $post_type = 'parts';
                        $data      = get_page_by_path('access', OBJECT, $post_type); //アクセス情報記事のIDを取得
                        $post_id   = $data->ID;
                        $access_title = get_the_title($post_id);
                        echo $access_title; ?>
                    <?php endif; ?>
                </h2>
                <p class="p-access__text c-text--bold c-text--white">
                    <?php
                    $post_type = 'parts';
                    $data      = get_page_by_path('access', OBJECT, $post_type); //アクセス情報記事の本文を取得
                    $post_con   = $data->post_content;
                    if (empty($post_con)) : ?>
                        <!-- 本文が空（未入力）の場合の処理 -->
                        <?php echo '本文の入力がありません。' . "\n" ?>
                    <?php else : ?>
                        <!-- 本文が空（未入力）ではない場合の処理 -->
                        <?php //カスタム投稿タイプ（投稿タイプ：parts）
                        $post_type = 'parts';
                        $data      = get_page_by_path('access', OBJECT, $post_type); //アクセス情報記事のIDを取得
                        $post_id   = $data->ID;
                        // カスタム投稿の本文を取得
                        $access_post_content = get_post_field('post_content', $post_id);
                        $access_post_content = wp_strip_all_tags($access_post_content, true); //htmlタグ周り除去
                        echo $access_post_content;
                        ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>

<?php get_footer(); ?> <!--footer.phpを読み込むテンプレートタグ（インクルードタグ）-->