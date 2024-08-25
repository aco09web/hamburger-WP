<?php
/*
YARPP Hoge
Author: aco
Description: テスト用テンプレートです。
*/
?>

<?php if (have_posts()) : ?>
    <h3 class="p-recommend__title c-text--brown c-text--bold c-icon-star__primary">おすすめ商品</h3>
    <div class="related-post">
        <ul class="p-recommend__container">
            <?php while (have_posts()) : the_post(); ?>
                <li id="post-<?php the_ID(); ?>" <?php post_class('p-recommend__card c-bg-color--beige'); ?>>
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
                    <div class="p-recommend__text-body">
                        <h4 class="p-recommend__item-title c-text--bold c-text--brown"><?php esc_html(the_title()); ?></h4>
                        <p class="p-recommend__item-text c-text--brown c-font-size--primary">
                            <?php $content = esc_html(get_the_content()); ?>
                            <?php
                            // HTMLタグの除去
                            $content = strip_tags($content);
                            //表示する文字数制限、省略記号を設定
                            echo wp_trim_words(get_the_content(), 39, '...'); ?></p>
                        <div class="p-recommend__link__container"><a href="<?php the_permalink(); ?>" class="c-text--bold c-text--brown c-font-size--primary"><?php echo esc_attr_e('Read more', 'hamburger'); ?></a></div>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php else : ?>
<?php endif; ?>