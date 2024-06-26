<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RaiseTechの課題サイトです。">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
</head>

<?php
// ベースとなるクラス名
$body_class = 'basic_class';
// トップページのみ表示するクラス名
if (is_front_page()) {
    $body_class .= ' front-page';
    // 個別ページのみ表示するクラス名
} elseif (is_single()) {
    $body_class .= ' single-page';
}
?>

<body class="<?php echo $body_class; ?>">
    <div class="c-wrapper">
        <div class="c-container">
            <header class="l-header p-header c-bg-color--salmon-pink">
                <p class="c-title--logo c-text--bold c-text--gray--primary"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                <?php get_search_form(); ?>
                <a href="#" class="p-header__button--menu c-text--bold c-text--gray--primary c-font--title">Menu</a>
            </header>