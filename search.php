<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">
    <section class="p-archive--Hero c-bg-color--black">
        <h1 class="p-archive__title c-text--bold c-text--white c-font--title">Search:<span class="p-archive__title--text c-text--white c-text--bold c-font--primary c-font-size--primary"><?php echo esc_html(get_search_query()); ?></span></h1>

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
            <?php
            if (isset($category_meta)) {
                echo $category_meta["subtitle"]; //カテゴリー小見出し出力
            }
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
                                    echo $content; ?></p>
                                <div class="p-card__link--container"><a href="<?php the_permalink(); ?>" class="p-card__link c-text--bold c-bg-color--white c-text--gray--primary">詳しく見る</a></div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
        </ul>
        <!--投稿内容の繰り返し処理が終わって一度のみ何かをしたいときはココに書く-->
    <?php else : ?>
        <p>検索したキーワードに合致するデータがありません</p>
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
    </section>




</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>
<?php get_footer(); ?> <!--footer.phpを読み込むテンプレートタグ（インクルードタグ）-->