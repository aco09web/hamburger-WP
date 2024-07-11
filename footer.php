<footer class="l-footer p-footer">

    <?php wp_nav_menu(array(
        'theme_location' => 'footer-menu',
        'menu' => 'footer-menu', // 管理画面でつけたメニュー名と一致させる
        'menu_class' => "p-footer__listBox c-text--white", // ul 要素に適用されるクラスを指定
        'add_li_class' => 'p-footer__list', // liタグへclass追加
    )); ?>
    <small class="p-footer__copyright c-text--white">Copyright: RaiseTech</small>
</footer>
<?php wp_footer(); ?>
</body>

</html>