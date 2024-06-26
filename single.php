<?php get_header(); ?> <!--header.phpを読み込むテンプレートタグ（インクルードタグ）-->
<main class="l-main">
    <?php while (have_posts()) : the_post(); ?>
        <section class="p-single--Hero">
            <h1 class="p-single__title c-text--bold c-text--white"><?php the_title(); ?></h1>
            <figure><?php if (has_post_thumbnail()) { /* アイキャッチ画像が設定されているかの判定 */
                        the_post_thumbnail( /* アイキャッチ画像をimgタグで表示 */
                            'full', /* 任意の画像サイズ */
                            array(
                                'class' => 'p-single__image', /* 任意のクラス名 */
                            )
                        );
                    } ?></figure>
        </section>



        <section class=" c-section--container--secondary">
            <div class="editor-styles-wrapper">
                <?php the_content(); ?>
            <?php endwhile; ?>
            </div>
        </section>
</main>
</div>
<?php get_sidebar(); ?>
<div class="p-nav__bg-color c-bg-color--black"></div>
</div>
<?php get_footer(); ?> <!--footer.phpを読み込むテンプレートタグ（インクルードタグ）-->