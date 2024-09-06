<?php get_header(); ?>
<main class="l-main">
    <section class="p-archive--Hero c-bg-color--black">
        <h1 class="p-archive__title c-text--bold c-text--white c-font--title">Menu:
            <span class="p-archive__title--text c-text--white c-text--bold c-font--primary c-font-size--primary">
                <?php
                // クエリ情報を取得
                $obj = get_queried_object();
                // 名前の取得（カテゴリー名またはタグ名）
                $term_name = $obj->name;
                // 記事数を取得
                $count = $obj->count;
                // タームIDの取得
                $term_id = $obj->term_id;
                // タクソノミー名
                $taxonomy = $obj->taxonomy;
                ?>
                <?php if (isset($term_name)) : //カテゴリー名またはタグ名が取得できた場合
                    echo $term_name; ?>
                <?php endif; ?>
                <?php if (isset($count)) : //記事数が取得できた場合
                    echo '<span>（' . $count . '件）</span>'; ?>
                <?php endif; ?>
            </span>
        </h1>
        <figure><img class="p-archive__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/archive-top-pc.webp" alt=”hamburger”></figure>
    </section>

    <section class="c-section--container--primary">
        <h2 class="c-section__heading2 c-text--bold">
            <?php
            //タームのカスタムフィールドを取得するためのIDは「カスタム分類（タクソノミー）名_タームID」
            $term_idsp = $taxonomy . "_" . $term_id;
            if (is_active_acf()) { //ACFプラグインが有効になっている場合
                //カスタムフィールドを取得・出力
                if (isset($term_idsp)) {
                    if (get_field('cat_field', $term_idsp)) {
                        echo get_field('cat_field', $term_idsp);
                    }
                }
            } else { //ACFプラグインが有効になっていない場合
            }
            ?>

        </h2>

        <p class="c-section__text">
            <?php if (term_description()): ?>
                <?php echo term_description(); ?>
            <?php endif; ?>

        </p>

        <ul>
            <?php if (have_posts()) : //投稿データがあるか調べる
            ?>
                <?php while (have_posts()) : the_post(); //投稿データがあれば、記事の投稿データを１つずつ取得していく処理を行う。//the_post();ループを次の投稿へ進める
                ?>
                    <li class="p-card-news">
                        <div class="p-card-news__body">
                            <?php echo get_post_meta(get_the_ID(), 'cat_field', true); ?>
                            <figure class="p-card-news__image--container">
                                <?php if (has_post_thumbnail()) : //もしアイキャッチが登録されていたら 
                                ?>
                                    <?php echo the_post_thumbnail('full', ['class' => 'p-card__image']); ?>
                                <?php else : //登録されていなかったら 
                                ?>
                                    <img class="p-card-news__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/news.webp" alt="hamburger">
                                <?php endif; ?>
                            </figure>
                            <div class="p-card-news__text--body">
                                <div class="<?php echo function_new_icon(); //NEWアイコンの表示
                                            ?>"></div>
                                <h3 class="p-card-news__title c-text--bold c-font-size--primary c-text--brown"><?php the_title(); ?></h3>
                                <ul class="c-flex">
                                    <?php
                                    $terms = get_terms('news-cat'); // タクソノミースラッグを指定
                                    foreach ($terms as $term) {
                                        echo '<li><a class="p-card-news__cat" href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
                                    }
                                    ?></ul>
                                <ul class="c-flex">
                                    <?php
                                    $terms = get_terms('news-tag'); // タクソノミースラッグを指定
                                    foreach ($terms as $term) {
                                        echo '<li><a class="c-bg-color--gray p-card-news__tag" href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
                                    }
                                    ?></ul>
                                <p class=" p-card-news__text c-font-size--primary c-text--brown">
                                    <?php $content = esc_html(get_the_content()); ?>
                                    <?php
                                    // HTMLタグの除去
                                    $content = strip_tags($content);
                                    //表示する文字数制限、省略記号を設定
                                    echo wp_trim_words(get_the_content(), 126, '...'); ?></p>
                                <div class="p-card-news__link--container"><a href="<?php the_permalink(); ?>" class="p-card-news__link c-text--bold c-text--brown"><?php echo esc_attr_e('Read more', 'hamburger'); ?></a></div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; //投稿内容の繰り返し処理が終わって一度のみ何かをしたいときはココに書く
                ?>
        </ul>
    <?php else : //投稿データがない場合
    ?>
        <p><?php echo esc_attr_e('No postings.', 'hamburger'); ?></p>
    <?php endif; ?>

    <?php if (is_active_wp_pagenavi()) : //WP-PageNaviプラグインが有効になっている場合 
    ?>
        <?php if (function_exists('wp_pagenavi')) :
            wp_pagenavi(array(
                'before' => '<div class="p-pagination c-text--gray--primary c-font--title">',
                'after' => '</div>',
                'wrapper_tag' => 'ul',
                'wrapper_class' => 'p-pagination__list',
            )); ?>
        <?php else : ?>
        <?php endif; ?>
    <?php else : //WP-PageNaviプラグインが有効になっていない場合 
    ?>
        <?php if ($wp_query->max_num_pages > 1) : //ページ数が1を超える場合に処理 
        ?>
            <div class="c-text--gray--primary c-font--title">
                <ul class="p-pagination__list--secondary u-mg-bottom--primary">
                    <li><?php previous_posts_link('前へ'); ?></li>
                    <li><?php next_posts_link('次へ'); ?></li>
                </ul>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    </section>
</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>
<?php get_footer(); ?>