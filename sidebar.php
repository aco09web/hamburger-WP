<div class="l-sidebar p-sidebar c-bg-color--gray">
    <p class="p-menu__title c-text--bold c-text--gray--primary c-font--title">Menu</p>
    <a href="#" class="p-nav__btn--close"><span class="p-nav__btn--close__text"><?php echo esc_attr_e('Close menu', 'hamburger'); ?></span></a>
    <?php wp_nav_menu(array(
        'theme_location' => 'side-menu',
        'menu' => 'side-menu', // 管理画面でつけたメニュー名と一致させる
        'menu_class' => "p-menu__listBox c-text--gray--primary", // ul 要素に適用されるクラスを指定
        'container' => 'nav', // ul 要素を nav でラップする
        'container_class' => 'p-menu c-bg-color--gray', // nav に適用されるクラスを指定
        'walker'  => new my_walker
    )); ?>
</div>