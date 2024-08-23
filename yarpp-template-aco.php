<?php
/*
YARPP Hoge
Author: aco
Description: テスト用テンプレートです。
*/
?>

<?php if (have_posts()) : ?>
    <h4 class="post-connection">関連記事</h4>
    <div class="related-post">
        <ul>
            <?php while (have_posts()) : the_post(); ?>
                <li id="post-<?php the_ID(); ?>" <?php post_class('p-card'); ?>>
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
                            <h3 class="p-card__title c-text--bold c-text--white"><?php esc_html(the_title()); ?></h3>
                            <p class="p-card__subtitle c-text--bold c-text--white">
                                <?php $excerpt = esc_html(get_the_excerpt());
                                if (has_excerpt()) : ?>
                                    <?php echo $excerpt; ?>
                                <?php endif; ?></p>
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
            <?php endwhile; ?>
        </ul>
    </div>
<?php else : ?>
<?php endif; ?>