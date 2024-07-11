<?php get_header(); ?>
<main class="l-main">
    <section class="p-archive--Hero c-bg-color--black">
        <h1 class="p-archive__title c-text--bold c-text--white c-font--title">Search:<span class="p-archive__title--text c-text--white c-text--bold c-font--primary c-font-size--primary"><?php echo esc_html(get_search_query()); ?></span></h1>

        <figure><img class="p-archive__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/archive-top-pc.webp" alt=”hamburger”></figure>
    </section>

    <section class="c-section--container--primary">

        <h2 class="c-section__heading2 c-text--bold">
            <?php echo esc_html(get_search_query()); ?><?php echo esc_attr_e('Search results for', 'hamburger'); ?>
        </h2>





        <ul>
            <?php if (have_posts()) : //投稿データがあるか調べる
            ?>
                <?php while (have_posts()) : the_post(); //投稿データがあれば、記事の投稿データを１つずつ取得していく処理を行う。//the_post();ループを次の投稿へ進める
                ?>
                    <li class="p-card">
                        <div class="p-card__body">
                            <?php echo get_post_meta(get_the_ID(), 'cat_field', true); ?>
                            <figure class="p-card__image--container"><?php if (has_post_thumbnail()) : //もしアイキャッチが登録されていたら 
                                                                        ?>
                                    <?php echo the_post_thumbnail('full', ['class' => 'p-card__image']); ?>
                                <?php else : //登録されていなかったら 
                                ?>
                                    <img class="p-card__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/article_01.webp" alt="hamburger">
                                <?php endif; ?>
                            </figure>
                            <div class="p-card__text--body">
                                <h3 class="p-card__title c-text--bold c-text--white"><?php esc_html(the_title()); ?></h3>
                                <p class="p-card__subtitle c-text--bold c-text--white"><?php
                                                                                        $excerpt = esc_html(get_the_excerpt());
                                                                                        if (has_excerpt()) : //抜粋があるかどうか
                                                                                        ?>
                                        <?php echo $excerpt; ?>
                                    <?php endif; ?></p>
                                <p class="p-card__text c-text--white c-font-size--primary">
                                    <?php $content = esc_html(get_the_content()); ?>
                                    <?php
                                    // HTMLタグの除去
                                    $content = strip_tags($content);
                                    // ショートコードの除去
                                    $content = strip_shortcodes($content);
                                    echo wp_trim_words(get_the_content(), 100, '...'); ?></p>
                                <div class="p-card__link--container"><a href="<?php the_permalink(); ?>" class="p-card__link c-text--bold c-bg-color--white c-text--gray--primary"><?php echo esc_attr_e('Read more', 'hamburger'); ?></a></div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; //投稿内容の繰り返し処理が終わって一度のみの処理がある場合
                ?>
        </ul>
    <?php else : //投稿データがない場合の処理
    ?>
        <p><?php echo esc_attr_e('There are no data matching the keywords searched.', 'hamburger'); ?></p>
    <?php endif; ?>

    <?php if (function_exists('wp_pagenavi')) : ?>
        <?php wp_pagenavi(array(
            'before' => '<div class="p-pagination c-text--gray--primary c-font--title">',
            'after' => '</div>',
            'wrapper_tag' => 'ul',
            'wrapper_class' => 'p-pagination__list',
            //'options' => array( // 管理画面で設定したオプションの上書き
            //'prev_text' => " ",
            //'next_text' => " "
            //)
        )); ?>
    <?php endif; ?>
    </section>




</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>
<?php get_footer(); ?>