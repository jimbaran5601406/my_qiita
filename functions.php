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
        'supports' => ['title', 'editor', 'custom-fields'],
        'show_in_rest' => true, // 新エディター有効化
    ]);
});

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
        $prev_link = str_replace('<a', '<a class="btn btn-primary float-left" href="#blog"', $prev_link);
        return $prev_link;
    }
}

/**
 * 古い記事へのページネーション生成
 *
 * @return $next_link
 */
function get_next_pagination() {
    $next_link = get_next_posts_link('>');

    if($next_link) {
        $next_link = str_replace('<a', '<a class="btn btn-primary float-right" href="#blog"', $next_link);
        return $next_link;
    }
}