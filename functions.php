
<?php
//テーマの翻訳対応
function hamburger_theme_setup()
{
    load_theme_textdomain('hamburger', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'hamburger_theme_setup');


//テーマサポート
add_theme_support('title-tag');
add_theme_support('post-thumbnails'); // アイキャッチ画像を利用できるようにする
add_theme_support('editor-styles'); //エディタスタイルを利用できるようにする
add_theme_support('automatic-feed-links'); //WordPressでフィードを利用できるようにする
add_theme_support('custom-header'); //テーマのカスタマイザーを使ってヘッダー画像を変更することができる
add_theme_support("wp-block-styles"); //ブロックエディタ側での装飾を実際の公開画面にも反映させる
add_theme_support("responsive-embeds"); //Youtubeなどの外部メディアを読み込んだ時に独自クラスを追加する
add_theme_support("custom-logo"); //カスタムロゴを有効にする
add_theme_support("align-wide"); //ブロックエディタで可能となった、画面全体を使っての画像の挿入を有効にする
add_theme_support("custom-background"); //bodyタグ内の背景画像を有効にする
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script')); //WordPressコアから出力されるHTMLタグをHTML5のフォーマットにする


//タイトル出力
function hamburger_title($title)
{
    if (is_front_page() && is_home()) { //トップページなら
        $title = get_bloginfo('name', 'display');
    } elseif (is_singular()) { //シングルページなら
        $title = single_post_title('', false);
    }
    return $title;
}
add_filter('pre_get_document_title', 'hamburger_title');
//フィルターを通して処理を行うことで、<head></head> の部分が出力されるタイミングに合わせてタイトルタグも出力される

function my_script_init()
{
    // google fonts CSS
    wp_enqueue_style('googlefonts', "//fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;700&family=Roboto:wght@700&display=swap", array(), null);
    wp_enqueue_style('mystyle', get_template_directory_uri() . '/css/mystyle.css', array(), '1.0.0');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0.0');
    // jQuery
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), 'false', true);
    // main.js
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');




//ナビゲーションメニュー
//2つのナビゲーションメニューを登録する
function register_my_menus()
{
    register_nav_menus(array(
        'side-menu' => 'Side Menu',
        'footer-menu'  => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'register_my_menus');

// wp_nav_menuのliにclass追加
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes['class'] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

//ナビゲーションメニューのカスタムウォーカー設定
class my_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array()) //レベルの最初の部分（= <ul>）
    {
        $output .= '<ul class="p-menu__subListBox">';
    }
    function end_lvl(&$output, $depth = 0, $args = array()) //レベルの最後の部分（= </ul>）
    {
        $output .= '</ul>';
    }
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) //HTML要素の最初（= <li><a>）
    {
        if ($depth == 0) { // 1階層目だったら
            $output .= '<li><a href="' . $item->url . '" class="p-menu__list c-text--bold">' . $item->title . '</a>';
        } else { //それ以外の階層
            $output .= '<li class="p-menu__subList"><a href="' . $item->url . '">' . $item->title . '</a>';
        }
    }
}

//カテゴリ説明文から自動で付与されるpタグを除去
remove_filter('term_description', 'wpautop');




//WP-PageNavi
//ページナビゲーション要素に割り当てられているデフォルトのクラス名を変更する
// 現在のページ数部分に付与されるclass
function wp_pagenavi_class_pages_func($class_name)
{
    return 'p-pagination__list pagination__text';
}
add_filter('wp_pagenavi_class_pages', 'wp_pagenavi_class_pages_func');

// 数字のリンクで、現在ページより小さい数字のリンクに付与されるclass
function wp_pagenavi_class_smaller_func($class_name)
{
    return 'p-pagination__list__link c-text--bold';
}
add_filter('wp_pagenavi_class_smaller', 'wp_pagenavi_class_smaller_func');

// 数字のリンクで、現在ページより大きい数字のリンクに付与されるclass
function wp_pagenavi_class_larger_func($class_name)
{
    return 'p-pagination__list__link c-text--bold';
}
add_filter('wp_pagenavi_class_larger', 'wp_pagenavi_class_larger_func');

// 一つ前へのリンクに付与されるclass
function wp_pagenavi_class_previouspostslink_func($class_name)
{
    return 'p-pagination__arrow-prev';
}
add_filter('wp_pagenavi_class_previouspostslink', 'wp_pagenavi_class_previouspostslink_func');

// 一つ先へのリンクに付与されるclass
function wp_pagenavi_class_nextpostslink_func($class_name)
{
    return 'p-pagination__arrow-next';
}
add_filter('wp_pagenavi_class_nextpostslink', 'wp_pagenavi_class_nextpostslink_func');

// 現在位置の数字に付与されるclass
function wp_pagenavi_class_current_func($class_name)
{
    return 'p-pagination__list__link p-pagination__link--current c-text--bold';
}
add_filter('wp_pagenavi_class_current', 'wp_pagenavi_class_current_func');

//デフォルトのページャーの前の記事・次の記事のリンクにclassを付与する

add_filter('previous_posts_link_attributes', 'add_prev_post_link_class');
function add_prev_post_link_class()
{
    return 'class="p-pagination__arrow-prev-secondary"';
}

add_filter('next_posts_link_attributes', 'add_next_post_link_class');
function add_next_post_link_class()
{
    return 'class="p-pagination__arrow-next-secondary"';
}




//エディタにオリジナルのスタイルを適用
//エディターとサイトのフロントの両方でeditor-style.cssを読み込ませる
function hamburger_enqueue_styles()
{
    wp_enqueue_style('editor-style', get_template_directory_uri() . '/css/editor-style.css');
}
add_action('enqueue_block_assets', 'hamburger_enqueue_styles');




//search-form
//投稿ページのみ検索されるように設定
function my_posy_search($search)
{
    if (is_search()) {
        $search .= " AND post_type = 'post'";
    }
    return $search;
}
add_filter('posts_search', 'my_posy_search');

//何も記入せずに検索をすると、TOPページにリダイレクトされる設定
function empty_search_redirect($wp_query)
{
    if ($wp_query->is_main_query() && $wp_query->is_search && !$wp_query->is_admin) {
        $s = $wp_query->get('s');
        $s = trim($s);
        if (empty($s)) {
            wp_safe_redirect(home_url('/'));
            exit;
        }
    }
}
add_action('parse_query', 'empty_search_redirect');

// 検索対象にカテゴリを含める
function custom_search($search, $wp_query)
{
    global $wpdb;

    //検索ページ以外
    if (!$wp_query->is_search)
        return $search;

    if (!isset($wp_query->query_vars))
        return $search;

    $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
    if (count($search_words) > 0) {
        $search = '';
        foreach ($search_words as $word) {
            if (!empty($word)) {
                $search_word = $wpdb->_escape("%{$word}%");
                $search .= " AND (
                        {$wpdb->posts}.post_title LIKE '{$search_word}'
                        OR {$wpdb->posts}.post_content LIKE '{$search_word}'
            /*タグ名・カテゴリ名を検索対象に含める記述 start*/
                        OR {$wpdb->posts}.ID IN (
                            SELECT distinct r.object_id
                            FROM {$wpdb->term_relationships} AS r
                            INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
                            INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
                            WHERE t.name LIKE '{$search_word}'
                        OR t.slug LIKE '{$search_word}'
                        OR tt.description LIKE '{$search_word}'
                        )
        /*タグ名・カテゴリ名を検索対象に含める記述 end*/
                ) ";
            }
        }
    }

    return $search;
}
add_filter('posts_search', 'custom_search', 10, 2);




//投稿を古い順に並び変える
function change_old($query)
{
    $query->set('order', 'ASC');
    $query->set('orderby', 'date');
}
add_action('pre_get_posts', 'change_old');

//カスタム投稿の記事一覧で並び順を日付降順に変更
function change_post_types_admin_order($wp_query)
{
    if (is_admin()) {
        $post_type_array = array('takeout', 'eatin'); // カスタム投稿のスラッグ（post_type）
        $post_type = $wp_query->query['post_type'];
        $get_orderby = get_query_var('orderby');
        if ($post_type && $get_orderby) {
            if (in_array($post_type, $post_type_array) && $get_orderby === 'menu_order title') {
                $wp_query->set('orderby', 'date'); // data = 日付
                $wp_query->set('order', 'DESC'); // DESC = 降順
            }
        }
    }
}
add_filter('pre_get_posts', 'change_post_types_admin_order');




//Advanced custom fieldプラグインの使用判定
function is_active_acf()
{
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');

    if (is_plugin_active('advanced-custom-fields/acf.php')) {
        return true;
    } else {
        return false;
    }
}

//WP-PageNaviプラグインの使用判定
function is_active_wp_pagenavi()
{
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');

    if (is_plugin_active('wp-pagenavi/wp-pagenavi.php')) {
        return true;
    } else {
        return false;
    }
}




//ブロックスタイルを追加
register_block_style(
    'core/image',
    array(
        'name'         => 'drop-shadow',
        'label'        => 'Drop Shadow',
        'inline_style' => '.wp-block-image.is-style-drop-shadow { box-shadow: rgb(128, 128, 128) 4px 4px 4px 2px; }',
    )
);
