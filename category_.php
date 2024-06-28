<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">

    <section class="p-archive--Hero c-bg-color--black">
        <h1 class="p-archive__title c-text--bold c-text--white c-font--title">Menu:
            <span class="p-archive__title--text c-text--white c-text--bold c-font--primary c-font-size--primary">
                <?php
                $cats = get_the_category();
                $cat = $cats[0];
                if ($cat->parent) {
                    $parent = get_category($cat->parent);
                    echo $parent->cat_name;
                } else {
                    echo $cat->cat_name;
                }
                ?>
            </span>
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
            <?php
            $categories = get_categories(array(
                'parent' => get_queried_object()->term_id
            ));

            if (!$categories) {
                $wp_query = new WP_Query(array(
                    'cat' => get_queried_object()->term_id
                ));
            }

            get_header();
            ?>

            <?php if (have_posts()) : ?><!--投稿データがあるか調べる-->
                <?php if ($categories) : ?>
                    <ul>
                        <?php foreach ($categories as $category) : ?>
                            <li><a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>"><?php echo $category->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <ul>
                        <?php while (have_posts()) : the_post(); ?> <!--投稿データがあれば、記事の投稿データを１つずつ取得していく処理を行う。//the_post();ループを次の投稿へ進める-->
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
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
    </section>
</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>
<?php get_footer(); ?> <!--footer.phpを読み込むテンプレートタグ（インクルードタグ）-->