<?php get_header(); ?>

<?php if (have_posts()) : //投稿データがあるか調べる 
?>
    <?php while (have_posts()) : the_post(); ?>
        <main class="l-main">
            <section class="p-single--Hero">
                <h1 class="p-single__title c-text--bold c-text--white"><?php the_title(); ?></h1>
                <figure> <?php if (has_post_thumbnail()) : //もしアイキャッチが登録されていたら 
                            ?>
                        <?php echo the_post_thumbnail('full', ['class' => 'p-single__image']); ?>
                    <?php else : //登録されていなかったら 
                    ?>
                        <img class="p-single__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/article_01.webp" alt="hamburger">
                    <?php endif; ?>
                </figure>
            </section>

            <section class=" c-section--container--secondary">
                <div class="editor-styles-wrapper">
                    <?php the_content(); ?>
                    <?php
                    if (is_active_acf()) : //ACFプラグインが有効になっている場合
                    ?>
                        <?php //ページ情報を取得
                        $this_obj = get_queried_object();
                        //投稿ID
                        $post_id = $this_obj->ID; ?>
                        <?php if (get_field('recommend-info', $post_id)) : // おすすめ情報タイトルがカスタムフィールドにある場合
                        ?>
                            <h3 class="p-recommend__title c-text--bold c-icon-star__primary">おすすめ情報</h3>
                            <p class="c-text--bold"><?php the_field('recommend-info', $post_id); ?>
                                <?php
                                $link = get_field('recommend-link');
                                if ($link) : // おすすめ情報のリンクがカスタムフィールドにある場合
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?><br>
                                    <span class="c-text--bold"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a></span>
                            </p>
                        <?php endif; ?>
                    <?php else : // おすすめ情報タイトルがカスタムフィールドにない場合
                    ?>
                        <p class="c-text--bold"><a href="<?php echo esc_url(home_url('/')); ?>">ブログのトップページへ</a></p>
                    <?php endif; ?>
                <?php else : //ACFプラグインが無効の場合
                ?>
                    <img class="p-frontHero__image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero_01.webp" alt=”hamburger”>
                <?php endif; ?>
                <?php
                if (function_exists('yarpp_related')) {
                    yarpp_related();
                }
                ?>
                <?php wp_link_pages(); ?>
                </div>
            </section>
        </main>
    <?php endwhile; ?>
<?php else : //投稿データがない場合の処理
?>
    <p><?php echo esc_attr_e('No postings.', 'hamburger'); ?></p>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>
<?php get_footer(); ?>