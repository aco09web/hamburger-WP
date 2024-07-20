<?php get_header(); ?>
<main class="l-main">
    <div class="p-frontHero">
        <?php
        $mainvisual_args = [
            'post_type' => 'mainvisual', // カスタム投稿：mainvisual
            'posts_per_page' => 1, // 表示する数
        ];
        $mainvisual_posts = get_posts($mainvisual_args); ?>
        <?php if ($mainvisual_posts) : foreach ($mainvisual_posts as $post) : setup_postdata($post); // 投稿がある場合 ▽ ループ開始 ▽
        ?>
                <?php
                if (is_active_acf()) : //ACFプラグインが有効になっている場合
                    //カスタム投稿：mainvisualのページスラッグからIDを取得
                    $post_type = 'mainvisual';
                    $data      = get_page_by_path('mainvisual', OBJECT, $post_type);
                    $post_id   = $data->ID;
                ?>
                    <?php if (get_field('hero-img', $post_id)) : // 画像がカスタムフィールドにある場合
                    ?>
                        <img class="p-frontHero__image" src="<?php the_field('hero-img', $post_id); ?>" alt=””>
                    <?php else : // 画像がカスタムフィールドにない場合
                    ?>
                        <img class="p-frontHero__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero_01.webp" alt=”hamburger”>
                    <?php endif; ?>
                <?php else : //ACFプラグインが無効の場合
                ?>
                    <img class="p-frontHero__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero_01.webp" alt=”hamburger”>
                <?php endif; ?>
                <?php
                if (is_active_acf()) : //ACFプラグインが有効になっている場合
                ?>
                    <h1 class=" p-frontHero__title c-text--bold c-text--white">
                        <?php
                        $post_type = 'mainvisual';
                        $data      = get_page_by_path('mainvisual', OBJECT, $post_type); //カスタム投稿：mainvisualのタイトルを取得
                        $post_tit   = $data->post_title;
                        if (empty($post_tit)) : //タイトルが空（未入力）の場合の処理
                        ?>
                            <?php echo 'タイトルの入力がありません。' . "\n" ?>
                        <?php else : //タイトルが空（未入力）ではない場合の処理
                        ?>
                            <?php //カスタム投稿タイプ（投稿タイプ：mainvisual）
                            $post_type = 'mainvisual';
                            $data      = get_page_by_path('mainvisual', OBJECT, $post_type);
                            $post_id   = $data->ID;
                            $title = get_the_title($post_id);
                            echo $title;
                            ?>
                        <?php endif; ?>
                    </h1>
                <?php else : //ACFプラグインが無効の場合
                ?>
                    <dd class="p-contents__text">
                        <?php echo esc_attr_e('Advanced custom field plugin is disabled', 'hamburger'); ?>
                    </dd>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : // 記事がない場合 
        ?>
            <h1 class="p-frontHero__title c-text--bold c-text--white"><?php echo esc_attr_e('Site Title', 'hamburger'); ?></h1>
            <img class="p-frontHero__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero_01.webp" alt=”hamburger”>
        <?php endif;
        wp_reset_postdata(); ?>
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
            <?php if ($takeout_posts) : foreach ($takeout_posts as $post) : setup_postdata($post); // 投稿がある場合 ▽ ループ開始 ▽
            ?>
                    <?php
                    if (is_active_acf()) : //ACFプラグインが有効になっている場合
                    ?>
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
                                    <?php the_content(); ?>
                                </p>
                            </a>
                        </dd>
                    <?php else : //ACFプラグインが無効の場合
                    ?>
                        <dd class="p-contents__text">
                            <?php echo esc_attr_e('Advanced custom field plugin is disabled', 'hamburger'); ?>
                        </dd>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else : // 記事がない場合 
            ?>
                <li><?php echo esc_attr_e('No postings.', 'hamburger'); ?></li>
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
            <?php if ($takeout_posts) : foreach ($takeout_posts as $post) : setup_postdata($post); // 投稿がある場合 ▽ ループ開始 ▽
            ?>
                    <?php if (is_active_acf()) : //ACFプラグインが有効になっている場合
                    ?>
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
                                    <?php the_content(); ?>
                                </p>
                            </a>
                        </dd>
                    <?php else : //ACFプラグインが無効の場合
                    ?>
                        <dd class="p-contents__text">
                            <?php echo esc_attr_e('Advanced custom field plugin is disabled', 'hamburger'); ?>
                        </dd>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else : // 記事がない場合 
            ?>
                <li><?php echo esc_attr_e('No postings.', 'hamburger'); ?></li>
            <?php endif;
            wp_reset_postdata(); ?>
        </dl>
    </div>

    <div class="p-access">
        <div class="p-access__wrapper">
            <div class="p-access__contents">
                <?php
                $access_args = [
                    'post_type' => 'access', // カスタム投稿名が「access」の場合
                    'posts_per_page' => 1, // 表示する数
                ];
                $access_posts = get_posts($access_args); ?>
                <?php if ($access_posts) : foreach ($access_posts as $post) : setup_postdata($post); // 投稿がある場合 ▽ ループ開始 ▽
                ?>
                        <?php
                        if (is_active_acf()) : //ACFプラグインが有効になっている場合
                        ?>
                            <h2 class="p-access__title c-text--bold c-text--white">
                                <?php
                                $post_type = 'access';
                                $data      = get_page_by_path('access', OBJECT, $post_type);
                                $post_tit   = $data->post_title; //アクセス情報記事のタイトルを取得
                                $post_con   = $data->post_content; //アクセス情報記事の本文を取得
                                $post_id   = $data->ID; //アクセス情報のIDを取得
                                if (empty($post_tit)) : //タイトルが空（未入力）の場合の処理
                                ?>
                                    <?php echo esc_attr_e('No title entered.', 'hamburger'); ?>
                                <?php else :
                                ?>
                                    <?php the_title(); ?>
                                <?php endif; ?>
                            </h2>
                            <p class="p-access__text c-text--bold c-text--white">
                                <?php
                                if (empty($post_con)) : //本文が空（未入力）の場合の処理
                                ?>
                                    <?php echo esc_attr_e('No text input.', 'hamburger'); ?>
                                <?php else : ?>
                                    <?php
                                    // カスタム投稿の本文を取得
                                    $access_post_content = get_post_field('post_content', $post_id);
                                    $access_post_content = wp_strip_all_tags($access_post_content, true); //htmlタグ周り除去
                                    echo $access_post_content;
                                    ?>
                                <?php endif; ?>
                            </p>
                        <?php else : //ACFプラグインが無効の場合
                        ?>
                            <p class="p-access__text c-text--bold c-text--white">
                                <?php echo esc_attr_e('Advanced custom field plugin is disabled', 'hamburger'); ?>
                            </p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : // 記事がない場合 
                ?>
                    <p class="c-text--white c-text--bold"><?php echo esc_attr_e('No postings.', 'hamburger'); ?></p>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>

<?php get_footer(); ?>