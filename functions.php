<?php
add_action('init', function ()
{
    // アイキャッチ画像をメニューに表示
    add_theme_support('post-thumbnails');
    // キャリア投稿ページにWP Subtitleフォーム表示
    add_post_type_support( 'career', 'wps_subtitle' );

    // キャリアのカスタム投稿タイプ追加
    register_post_type('career', [
        'label' => 'キャリア',
        'description' => 'Add a career to Career section',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', 'custom-fields'],
        'show_in_rest' => true, // 新エディター有効化
    ]);

    // 資格カスタム投稿タイプ追加
    register_post_type('certification', [
        'label' => '資格',
        'description' => 'Add a certification to Certification section',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-awards',
        'supports' => ['title', 'custom-fields'],
        'show_in_rest' => true, // 新エディター有効化
    ]);
});

/**
 * the_excerptの抜粋単語数を50に制限
 */
function custom_excerpt_length($length) {
     return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * the_excerptの上限単語数を超過した部分を'...'に置換
 */
function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

/**
 * タイトル文字数を任意の文字列で切り取り'...'に置換して出力
 *
 * @param [String] $title
 * @param [Int] $max_title_num
 * @return void
 */
function trim_title_or_default($title, $max_title_num = 20) {
    $title_num = mb_strlen($title);

    if($title_num > $max_title_num) {
        echo(mb_substr($title, 0, $max_title_num).'...');
    } else {
        echo($title);
    }
}

/**
 * アイキャッチ画像のパスを取得
 * ※なければデフォルト画像のパスを返す
 *
 * @var $id 投稿ID
 * @var $img アイキャッチ画像のパス
 * @return $img
 */
function get_eyecatch_with_default()
{
    if (has_post_thumbnail()) {
        $id = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src($id, 'large');
    } else {
        $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
    }

    return $img;
}

/**
 * 新しい記事へのページネーション生成
 *
 * @return $prev_link
 */
function get_prev_pagination() {
    $prev_link = get_previous_posts_link('<');

    if($prev_link) {
        $prev_link = str_replace('<a', '<a class="btn btn-primary float-left" href="', $prev_link);
        return $prev_link;
    }

    if(is_page()) {
        $prev_page_url = esc_url(get_previous_posts_page_link());
        $prev_page_url_to_blog = substr_replace($prev_page_url, '/#blog"', -1);
        if($prev_link) {
            $prev_link = str_replace('<a', '<a class="btn btn-primary float-left" href="'.$prev_page_url_to_blog, $prev_link);
            return $prev_link;
        }
    }
}

/**
 * 古い記事へのページネーション生成
 *
 * @return $next_link
 */
function get_next_pagination() {
    $next_link = get_next_posts_link('>');
    $next_page_url = esc_url(get_next_posts_page_link());
    $next_page_url_to_blog = substr_replace($next_page_url, '/#blog"', -1);

    if($next_link) {
        $next_link = str_replace('<a', '<a class="btn btn-primary float-right" href="'.$next_page_url_to_blog, $next_link);
        return $next_link;
    }
}
