<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">
    <div class="p-frontHero">
        <h1 class="p-frontHero__title c-text--bold c-text--white">ダミーサイト</h1>
    </div>
    <div class="p-contents">
        <dl class="p-contents__list p-contents__list__takeOut">
            <dt class="p-contents__title c-text--gray--secondary c-text--bold c-font--title">Take Out</dt>
            <div>


                <?php
                $takeout_args = [
                    'post_type' => 'takeout', // カスタム投稿名が「takeout」の場合
                    'posts_per_page' => 3, // 表示する数
                ];
                $takeout_posts = get_posts($takeout_args); ?>

                <?php if ($takeout_posts) : foreach ($takeout_posts as $post) : setup_postdata($post); // 投稿がある場合 
                ?>

                        <!-- ▽ ループ開始 ▽ -->

                        <dd class="p-contents__text">
                            <a href="<?php echo esc_url(home_url('/category/burger/take-out/')); ?>">

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




                <?php
                $categories = get_categories(array(
                    'orderby' => 'name',
                    'order' => 'ASC'
                ));
                foreach ($categories as $category) {
                    echo '<p>カテゴリー名：' . $category->name . '</p>';
                    echo '<p>カテゴリーページのURL:' . get_category_link($category->term_id) . '</p>';
                    echo '<p>説明文：' . $category->description . '</p>';
                } ?>


                <?php
                $cat = 10; // カテゴリIDの設定
                ?>
                <a href='<?php echo esc_url(get_category_link($cat)); ?>'>aaaa</a>


                <a href="<?php echo esc_url(home_url('/category/burger/take-out/')); ?>">
                    <dd class="p-contents__text">

                        <p class="p-contents__subTitle c-text--bold c-font--title">Take OUT</p>
                        <p class="p-contents__subText">当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで利用できる商品を掲載しています当店のテイクアウトで</p>
                    </dd>
                </a>
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