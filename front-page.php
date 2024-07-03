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
                <h2 class="p-access__title c-text--bold c-text--white"><?php $access_title = get_the_title(232); // カスタム投稿のID
                                                                        echo $access_title; ?></h2>
                <p class="p-access__text c-text--bold c-text--white"><?php
                                                                        $access_post_id = 232; // カスタム投稿のID
                                                                        // カスタム投稿の本文を取得
                                                                        $access_post_content = get_post_field('post_content', $access_post_id);
                                                                        $access_post_content = wp_strip_all_tags($access_post_content, true); //htmlタグ周り除去
                                                                        echo $access_post_content;
                                                                        ?></p>
            </div>
        </div>
    </div>
</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>

<?php get_footer(); ?> <!--footer.phpを読み込むテンプレートタグ（インクルードタグ）-->