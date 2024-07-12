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