<?php get_header(); ?>
<main class="l-main">
    <section class="p-archive--Hero c-bg-color--black">
        <h1 class="p-archive__title c-text--bold c-text--white c-font--title">Menu:
            <span class="p-archive__title--text c-text--white c-text--bold c-font--primary c-font-size--primary">
                <?php single_cat_title(); ?>
            </span>
        </h1>
        <figure><img class="p-archive__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/archive-top-pc.webp" alt=”hamburger”></figure>
    </section>

    <section class="c-section--container--primary">
        <h2 class="c-section__heading2 c-text--bold">
            <?php
            $taxonomy = 'takeout-eatin-cat'; // カスタム分類名
            $term_slug = get_query_var('term'); //カスタムタクソノミーの情報を取得
            $the_term = get_term_by('slug', $term_slug, $taxonomy);
            $term_id = $the_term->term_id; //タクソノミーのIDを取得
            //タームのカスタムフィールドを取得するためのIDは「カスタム分類（タクソノミー）名_タームID」
            $term_idsp = $taxonomy . "_" . $term_id;
            if (is_active_acf()) { //ACFプラグインが有効になっている場合
                //カスタムフィールドを取得・出力
                if (get_field('subtitle-takeout-eatin', $term_idsp)) {
                    echo get_field('subtitle-takeout-eatin', $term_idsp);
                }
            } else { //ACFプラグインが有効になっていない場合
            }
            ?>
        </h2>

        <p class="c-section__text">
            <?php //カスタムタクソノミーの説明文を取得。
            if (is_tax('takeout-eatin-cat', 'take-out-cat')) : ?>
                <?php echo term_description('21', 'take-out-cat') ?>
            <?php elseif (is_tax('takeout-eatin-cat', 'eat-in-cat')) : ?>
                <?php echo term_description('22', 'take-out-cat') ?>
            <?php endif; ?>
        </p>

        <ul>
            <?php if (have_posts()) : //投稿データがあるか調べる
            ?>
                <?php while (have_posts()) : the_post(); //投稿データがあれば、記事の投稿データを１つずつ取得していく処理を行う。//the_post();ループを次の投稿へ進める
                ?>
                    <li class="p-card">
                        <div class="p-card__body">
                            <?php echo get_post_meta(get_the_ID(), 'cat_field', true); ?>
                            <figure class="p-card__image--container">
                                <?php if (has_post_thumbnail()) : //もしアイキャッチが登録されていたら 
                                ?>
                                    <?php echo the_post_thumbnail('full', ['class' => 'p-card__image']); ?>
                                <?php else : //登録されていなかったら 
                                ?>
                                    <img class="p-card__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/article_01.webp" alt="hamburger">
                                <?php endif; ?>
                            </figure>
                            <div class="p-card__text--body">
                                <h3 class="p-card__title c-text--bold c-text--white"><?php the_title(); ?></h3>
                                <p class="p-card__subtitle c-text--bold c-text--white"><?php echo esc_html(get_the_excerpt()); ?></p>
                                <p class="p-card__text c-text--white c-font-size--primary">
                                    <?php $content = esc_html(get_the_content()); ?>
                                    <?php
                                    // HTMLタグの除去
                                    $content = strip_tags($content);
                                    //表示する文字数制限、省略記号を設定
                                    echo wp_trim_words(get_the_content(), 126, '...'); ?></p>
                                <div class="p-card__link--container"><a href="<?php the_permalink(); ?>" class="p-card__link c-text--bold c-bg-color--white c-text--gray--primary"><?php echo esc_attr_e('Read more', 'hamburger'); ?></a></div>
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