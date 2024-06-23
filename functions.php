<?php
//テーマサポート
add_theme_support('title-tag');
// アイキャッチ画像を利用できるようにする
add_theme_support('post-thumbnails');

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

// 画像ファイルの拡張子を追加
function custom_upload_mimes($existing_mimes)
{
    // ICOファイルを追加する
    $existing_mimes['ico'] = 'image/vnd.microsoft.icon';
    return $existing_mimes;
}
add_filter('upload_mimes', 'custom_upload_mimes');

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


//カスタムウォーカー設定
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


// カテゴリのカスタマイズ
function get_categor_meta_ex()
{
    return [
        'subtitle' => 'サブタイトル',
    ];
}
function category_add_form_fields($tag)
{
    foreach (get_categor_meta_ex() as $key => $value) {
        echo '<div class="form-field form-required term-name-wrap"><tr class="form-field"><th><label for="extra_text">' . $value . '</label></th><td>
                    <input type="text" name="Cat_meta[' . $key . ']" size="25" value="" /></td></tr></div>';
    }
};
function category_edit_form_fields($tag)
{
    $cat_id = $tag->term_id;
    $cat_meta = get_option("category_$cat_id");
    foreach (get_categor_meta_ex() as $key => $value) {
        echo '<tr class="form-field"><th><label for="extra_text">' . $value . '</label></th><td><input type="text" name="Cat_meta[' . $key . ']" size="25" value="' . $cat_meta[$key] . '" /></td></tr>';
    }
};
add_action('category_add_form_fields', 'category_add_form_fields');
add_action('category_edit_form_fields', 'category_edit_form_fields');
function save_category($category_id)
{
    $cat_meta = get_option("category_$category_id");
    if (isset($_POST['Cat_meta'])) {
        //配列キーがあった場合の処理
        $cat_keys = array_keys($_POST['Cat_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['Cat_meta'][$key])) {
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
    }

    update_option("category_$category_id", $cat_meta);
};
add_action('edited_term', 'save_category');
add_action('created_term', 'save_category');
add_action('init', 'my_add_pages_categories');
function my_add_pages_categories()
{
    register_taxonomy_for_object_type('category', 'page');
}
add_action('pre_get_posts', 'my_set_page_categories');
function my_set_page_categories($query)
{
    if ($query->is_category == true && $query->is_main_query()) {
        $query->set('post_type', array('post', 'page', 'nav_menu_item'));
    }
}



//ページャーのクラス名変更/*w-pagenavi　css置換　*/
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

// 先頭へのリンクに付与されるclass
function wp_pagenavi_class_first_func($class_name)
{
    return 'custom-first';
}
add_filter('wp_pagenavi_class_first', 'wp_pagenavi_class_first_func');

// 最後へのリンクに付与されるclass
function wp_pagenavi_class_last_func($class_name)
{
    return 'custom-last';
}
add_filter('wp_pagenavi_class_last', 'wp_pagenavi_class_last_func');

// 現在位置の数字に付与されるclass
function wp_pagenavi_class_current_func($class_name)
{
    return 'p-pagination__list__link p-pagination__link--current c-text--bold';
}
add_filter('wp_pagenavi_class_current', 'wp_pagenavi_class_current_func');

// 数字のリンクに付与されるclass
function wp_pagenavi_class_page_func($class_name)
{
    return 'custom-page';
}
add_filter('wp_pagenavi_class_page', 'wp_pagenavi_class_page_func');

// 数字の省略部分に付与されるclass
function wp_pagenavi_class_extend_func($class_name)
{
    return 'custom-extend';
}
add_filter('wp_pagenavi_class_extend', 'wp_pagenavi_class_extend_func');




//カテゴリーのカスタムフィールドを追加
//wp-admin/edit-tags.php?taxonomy=categoryにフィールドを作る
/*--
add_action('category_add_form_fields', 'category_add_form_fields');
function category_add_form_fields()
{
    $default_field_name = '';
    $html = '
  <div class="form-field">
    <label for="term_meta[category_field_name]">カテゴリーのカスタムフィールド</label>
    <input type="text" name="term_meta[category_field_name]" id="term_meta[category_field_name]" value="' . $default_field_name . '">
  </div>
  ';
    echo $html;
}

//wp-admin/term.php?taxonomy=categoryにフィールドを作る
add_action('category_edit_form_fields', 'category_edit_form_fields');
function category_edit_form_fields($tag)
{
    $term_id = $tag->term_id;
    $term_meta = get_option("taxonomy_$term_id");
    $term_meta['category_field_name'] = isset($term_meta['category_field_name']) ? $term_meta['category_field_name'] : '';
    $html = '
  <tr class="form-field">
    <th scope="row" valign="top"><label for="term_meta[category_field_name]">カテゴリーのカスタムフィールド</label></th>
    <td>
      <input type="text" name="term_meta[category_field_name]" id="term_meta[category_field_name]" value="' . esc_attr($term_meta['category_field_name']) . '">
    </td>
  </tr>
  ';
    echo $html;
}

//追加した項目を保存
add_action('edited_category', 'save_taxonomy_custom_meta', 10, 2);
add_action('created_category', 'save_taxonomy_custom_meta', 10, 2);
function save_taxonomy_custom_meta($term_id)
{
    if (isset($_POST['term_meta'])) {
        $t_id = $term_id;
        $term_meta = get_option("taxonomy_$t_id");
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        update_option("taxonomy_$t_id", $term_meta);
    }
}
--*/










/*<?php // カテゴリーのカスタムフィールドを表示
            $categories = get_categories();
            foreach ($categories as $category) :
                $catname = '';
                $category_color = '';
                $category_field_name = '';
                if ($category) {
                    $catname = $category->cat_name;
                    //追加項目の取得
                    $category_id = get_cat_ID($catname);
                    $term_meta = get_option("taxonomy_$category_id");
                    $category_field_name = isset($term_meta['category_field_name']) ? $term_meta['category_field_name'] : '';
                }
            ?>
                <?php if ($category_field_name) : ?>
                    <?= $category_field_name ?>
                <?php endif; ?>
            <?php endforeach; ?>*/






//ウィジェットが扱えるよう設定
function wpbeg_widgets_init()
{
    register_sidebar(
        array(
            'name'          => 'カテゴリーウィジェット',
            'id'            => 'category_widget',
            'description'   => 'カテゴリー用ウィジェットです',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
            'after_title'   => "</h2>\n",
        )
    );
    register_sidebar(
        array(
            'name'          => 'タグウィジェット',
            'id'            => 'tag_widget',
            'description'   => 'タグ用ウィジェットです',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2><i class="fa fa-tags" aria-hidden="true"></i>',
            'after_title'   => "</h2>\n",
        )
    );
    register_sidebar(
        array(
            'name'          => 'アーカイブウィジェット',
            'id'            => 'archive_widget',
            'description'   => 'アーカイブ用ウィジェットです',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2><i class="fa fa-archive" aria-hidden="true"></i>',
            'after_title'   => "</h2>\n",
        )
    );
}
add_action('widgets_init', 'wpbeg_widgets_init');
