<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">

    <section class="p-archive--Hero c-bg-color--black">
        <h1 class="p-archive__title c-text--bold c-text--white c-font--title">Menu:
            <span class="p-archive__title--text c-text--white c-text--bold c-font--primary c-font-size--primary">
                <?php
                // カテゴリーのデータを取得
                $cat = get_the_category();
                $cat = $cat[0];
                ?>
                <?php echo $cat->cat_name; ?></span>
        </h1>

        <figure><img class="p-archive__image" src="<?php echo get_template_directory_uri(); ?>/images/archive-top-pc.webp" alt=”hamburger”></figure>
    </section>



    <section class="c-section--container--primary">
        <h2 class="c-section__heading2 c-text--bold">
            <?php
            $categories = get_the_category();
            $cat_meta = [];
            foreach ($categories as $category) {
                $category_meta = get_option("category_$category->term_id");
            }
            ?>
            <?php echo $category_meta["subtitle"]; //カテゴリー小見出し出力
            ?>
        </h2>

        <p class="c-section__text">
            <?php
            // カテゴリーの説明文を取得
            if (is_category() && category_description()) {
                echo category_description();
            }
            ?></p>



        <ul>
            <?php if (have_posts()) : ?> <!--投稿データがあるか調べる-->
                <?php while (have_posts()) : the_post(); ?> <!--投稿データがあれば、記事の投稿データを１つずつ取得していく処理を行う。//the_post();ループを次の投稿へ進める-->
                    <!--コンテンツ表示処理.表示する内容自体はthe_title()と書けば記事タイトル、the_content()と書けばコンテンツの内容を表示する-->
                    <li class="p-card">
                        <div class="p-card__body">
                            <?php echo get_post_meta(get_the_ID(), 'cat_field', true); ?>
                            <figure class="p-card__image--container"><?php echo the_post_thumbnail('full', ['class' => 'p-card__image']); ?></figure>
                            <div class="p-card__text--body">
                                <h3 class="p-card__title c-text--bold c-text--white"><?php the_title(); ?></h3>
                                <p class="p-card__subtitle c-text--bold c-text--white"><?php echo get_the_excerpt(); ?></p>
                                <p class="p-card__text c-text--white c-font-size--primar">
                                    <?php $content = get_the_content(); ?>
                                    <?php
                                    // HTMLタグの除去
                                    $content = strip_tags($content);
                                    // ショートコードの除去
                                    $content = strip_shortcodes($content);
                                    echo wp_trim_words(get_the_content(), 126, '...'); ?></p>
                                <div class="p-card__link--container"><a href="<?php the_permalink(); ?>" class="p-card__link c-text--bold c-bg-color--white c-text--gray--primary">詳しく見る</a></div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
        </ul>
        <!--投稿内容の繰り返し処理が終わって一度のみ何かをしたいときはココに書く-->
    <?php else : ?>
        <p>投稿データがありません</p>
        <!--//投稿データがない場合の処理「投稿記事がありません」とフロントで表示させる-->
    <?php endif; ?>
    <?php if (function_exists('wp_pagenavi')) :
        wp_pagenavi(array(
            'before' => '<div class="p-pagination c-text--gray--primary c-font--title">',
            'after' => '</div>',
            'wrapper_tag' => 'ul',
            'wrapper_class' => 'p-pagination__list',
            //'options' => array( // 管理画面で設定したオプションの上書き
            //'prev_text' => " ",
            //'next_text' => " "
            //)
        ));
    endif; ?>

    <!--<article class="p-card">
        <div class="p-card__body">
            <figure class="p-card__image--container"><img class="p-card__image" src="./images/article_01.webp" alt="hamburger"></figure>
            <div class="p-card__text--body">
                <h3 class="p-card__title c-text--bold c-text--white">チーズバーガー</h3>
                <p class="p-card__subtitle c-text--bold c-text--white">小見出しが入ります</p>
                <p class="p-card__text c-text--white c-font-size--primar">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                <div class="p-card__link--container"><a href="#" class="p-card__link c-text--bold c-bg-color--white c-text--gray--primary">詳しく見る</a></div>
            </div>
        </div>
    </article>-->

    </section>



    <!--<div class="p-pagination--pc c-text--gray--primary c-font--title">
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
    </div>-->
</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>
<?php get_footer(); ?> <!--footer.phpを読み込むテンプレートタグ（インクルードタグ）-->