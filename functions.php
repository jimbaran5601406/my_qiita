<?php
add_action('init', function ()
{
    // アイキャッチ画像をメニューに表示
    add_theme_support('post-thumbnails');
    // キャリア投稿ページにWP Subtitleフォーム表示
    add_post_type_support( 'career', 'wps_subtitle' );
    // メニューをサポート
    register_nav_menus([
        'global_nav' => 'グローバルナビゲーション'
    ]);

    // アバウトのカスタム投稿タイプ追加
    register_post_type('about', [
        'label' => 'アバウト',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => ['title', 'custom-fields'],
        'show_in_rest' => true, // 新エディター有効化
    ]);

    // キャリアのカスタム投稿タイプ追加
    register_post_type('career', [
        'label' => 'キャリア',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', 'custom-fields'],
        'show_in_rest' => true, // 新エディター有効化
    ]);

    // スキルカスタム投稿タイプ追加
    register_post_type('skills', [
        'label' => 'スキル',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-editor-code',
        'supports' => ['title', 'custom-fields'],
        'show_in_rest' => true, // 新エディター有効化
    ]);

    // ポートフォリオカスタム投稿タイプ追加
    register_post_type('portfolios', [
        'label' => 'ポートフォリオ',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'custom-fields'],
        'show_in_rest' => true, // 新エディター有効化
    ]);

     // 資格カスタム投稿タイプ追加
    register_post_type('certifications', [
        'label' => '資格',
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
 * コメント欄カスタマイズ
 */
function custom_comment_form($args) {
    $args['fields']['author'] = '';
    $args['fields']['url'] = '';
    $args['fields']['email'] = '';
    $args['comment_notes_before'] = '';
    $args['title_reply'] = '';
    $args['id_submit'] = 'comment_submit';
    $args['label_submit'] = '送信';
    $args['comment_field'] = '<div class="form-group"><textarea class="form-control" name="comment" rows="5" placeholder="間違ってる箇所、アドバイス等ございましたコメントください！"></textarea></div>';

    return $args;
}
add_filter('comment_form_defaults', 'custom_comment_form');

/**
 * コメント入力欄の表示順を変更する
 */
function move_comment_field_to_bottom($fields) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;

  return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field_to_bottom' );

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
        $i = rand(1, 3);
        $img = get_template_directory_uri() . '/assets/img/default-bg'.$i.'.jpg';
    }

    return $img;
}

/**
 * サムネイル画像のパスを取得
 *
 * @param [Int] $post_id 投稿ID
 * @return void
 */
function the_thumbnail($post_id)
{
    $attch_id = get_post_thumbnail_id($post_id);
    $img = wp_get_attachment_image_src($attch_id, 'medium');

    echo '<img src="'.esc_url($img[0]).'" class="card-img-top">';
}

/**
 * 新しい記事へのページネーション生成
 *
 * @return $prev_link
 */
function get_prev_pagination() {
    $prev_link = get_previous_posts_link('<');
    $prev_page_url = esc_url(get_previous_posts_page_link());
    $prev_page_url_to_blog = substr_replace($prev_page_url, '/#blog"', -1);

    if($prev_link) {
        $prev_link = str_replace('<a', '<a class="btn btn-primary float-left" href="'.$prev_page_url_to_blog, $prev_link);
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
    $next_page_url = esc_url(get_next_posts_page_link());
    $next_page_url_to_blog = substr_replace($next_page_url, '/#blog"', -1);

    if($next_link) {
        $next_link = str_replace('<a', '<a class="btn btn-primary float-right" href="'.$next_page_url_to_blog, $next_link);
        return $next_link;
    }
}

/**
 * 投稿ページで前の記事へのリンク表示
 */
function the_prev_post_link() {
    $prev_post = get_previous_post();
    $prev_post_permalink = get_permalink( $prev_post->ID );
    $prev_post_title = $prev_post->post_title;
    if ($prev_post ) {
        echo '<div class="col-6 text-right"><a class="btn btn-outline-primary" href="'.$prev_post_permalink.'">前の記事へ >></a></div>';
    } else {
        echo '<div class="col-6 text-right"><p>最後の記事です</p></div>';
    }
}

/**
 * 投稿ページで次の記事へのリンク表示
 */
function the_next_post_link() {
    $next_post = get_next_post();
    $next_post_permalink = get_permalink( $next_post->ID );
    $next_post_title = $next_post->post_title;
    if ($next_post ) {
        echo '<div class="col-6 text-left"><a class="btn btn-outline-primary left-blo" href="'.$next_post_permalink.'"><< 次の記事へ</a></div>';
    } else {
        echo '<div class="col-6 text-left"><p>最新記事です</p></div>';
    }
}

/**
 * 投稿記事の見出しをセットしたメニュー項目表示
 *
 * @param [String] $content
 * @return void
 */
function the_menu_items_assigned_headings($content) {
    preg_match_all('/<h[1-6]>.+<\/h[1-6]>/u', $content, $headings);

    if(!empty($headings[0])){
        foreach($headings[0] as $key => $heading) {
            // 各見出しのテキスト取得
            $heading = strip_tags($heading);
            echo "<li class='nav-item' data-aos='zoom-in-downp' data-aos-duration='2000'><a class='nav-link js-scroll-trigger' href='#hd_$key'>$heading</a></li>";
        }
    } else {
        return;
    }
}

/**
 * グルーバルナビゲーション項目表示
 */
function the_global_nav() {
    $menu_name = 'global_nav';
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    foreach($menu_items as $item) {
        echo "<li class='nav-item' data-aos='zoom-in-downp' data-aos-duration='2000'><a class='nav-link js-scroll-trigger' href='$item->url'>$item->title</a></li>";
    }
}

/**
 * 閲覧端末スマホチェック
 *
 * @return boolean
 */
function is_mobile()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    return preg_match('/iphone|ipod|ipad|android/ui', $user_agent);
}

/**
 * オススメ記事取得
 *
 * @return [Array] $recommend_posts
 */
function get_recommend_posts() {
    $args = [
        'tag' => 'recommend',
        'posts_per_page' => 4,
    ];
    $recommend_posts = get_posts($args);
    if($recommend_posts) {
        return $recommend_posts;
    }
}

/**
 * 関連記事取得
 *
 * @param [Int] $id
 * @return [Array] $recommend_posts
 */
function get_related_posts($id) {
    $args = [
        'category' => $id,
        'posts_per_page' => 4,
    ];
    $related_posts = get_posts($args);
    if($related_posts) {
        return $related_posts;
    }
}