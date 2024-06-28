<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">
    <div class="p-frontHero">
        <h1 class="p-frontHero__title c-text--bold c-text--white">ダミーサイト</h1>
    </div>
    <div class="p-contents">
        <dl class="p-contents__list p-contents__list__takeOut">
            <dt class="p-contents__title c-text--gray--secondary c-text--bold c-font--title">Take Out</dt>
            <div>
                <dd class="p-contents__text">
                    <?php
                    $args = array(
                        'post_type' => 'takeout', //カスタム投稿タイプ名
                        'posts_per_page' => 2, //取得する投稿の件数
                    );
                    $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()) : // 投稿がある場合 
                    ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <!-- ここに投稿がある場合の記述 -->
                            <p class="p-contents__subTitle c-text--bold"><?php the_title(); ?></p>
                            <p class="p-contents__subText"><?php
                                                            // HTMLタグの除去
                                                            $content = strip_tags($content);
                                                            // ショートコードの除去
                                                            $content = strip_shortcodes($content);
                                                            echo $content(); ?></p>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <!-- ここに投稿がない場合の記述 -->
                    <?php endif;
                    wp_reset_postdata(); ?>


                    <?php
                    $event_args = [
                        'post_type' => 'takeout', // カスタム投稿名が「event」の場合
                        'posts_per_page' => 5, // 表示する数
                    ];
                    $event_posts = get_posts($event_args); ?>

                    <?php if ($event_posts) : foreach ($event_posts as $post) : setup_postdata($post); // 投稿がある場合 
                    ?>

                            <!-- ▽ ループ開始 ▽ -->

                            <li>
                                <p><?php the_time('Y年 n月'); ?></p>
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                            </li>

                            <!-- △ ループ終了 △ -->

                        <?php endforeach; ?>

                    <?php else : // 記事がない場合 
                    ?>

                        <li>まだ投稿がありません。</li>

                    <?php endif;
                    wp_reset_postdata(); ?>
                </dd>
                <dd class="p-contents__text">
                    <p class="p-contents__subTitle c-text--bold c-font--title">Take OUT</p>
                    <p class="p-contents__subText">当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで</p>
                </dd>
            </div>
        </dl>
        <dl class="p-contents__list p-contents__list__eatIn">
            <dt class="p-contents__title c-text--white c-text--bold">Eat In</dt>
            <div>
                <dd class="p-contents__text">
                    <p class="p-contents__subTitle c-text--bold">Eat In</p>
                    <p class="p-contents__subText">店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです</p>
                </dd>
                <dd class="p-contents__text">
                    <p class="p-contents__subTitle c-text--bold">Eat In</p>
                    <p class="p-contents__subText">店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです店内でお食事いただけるメニューです</p>
                </dd>
            </div>
        </dl>
    </div>
    <div class="p-access">
        <div class="p-access__wrapper">
            <div class="p-access__contents">
                <h2 class="p-access__title c-text--bold c-text--white">見出しが入ります</h2>
                <p class="p-access__text c-text--bold c-text--white">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
            </div>
        </div>
    </div>
</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>

<?php get_footer(); ?> <!--footer.phpを読み込むテンプレートタグ（インクルードタグ）-->