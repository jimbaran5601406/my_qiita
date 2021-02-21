<?php
/**
 * My Qiita WordPress Theme
 * @author: Kei Funatsuya
 * @link: https://myqiita.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
?>
<!--
┳┻|
┻┳|
┳┻|_∧
┻┳|ω･)  ﾐﾃﾏｽﾖ
┳┻|⊂ﾉ
┻┳| Ｊ￣￣￣￣￣￣￣
My Qiitaのソースをご覧いただきありがとうございます。
よかったら参考にしてください！
-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

  <?php get_header(); ?>

</head>

<body <?php body_class(); ?>>

  <?php get_template_part('template-parts/navigation'); ?>

  <?php if(have_posts()): ?>

    <?php while(have_posts()): the_post(); $category = get_the_category(); ?>

      <?php
      $img = get_eyecatch_with_default();
      ?>

      <div class="container single-container">
        <div class="row">
          <div class="col-lg-8 col-md-12 mx-auto">
            <div class="post-ad">
              <a href="https://px.a8.net/svt/ejp?a8mat=3H5N52+7VEE9U+3L4M+6WEWH" rel="nofollow">
                <img border="0" width="728" height="90" alt="" src="https://www22.a8.net/svt/bgt?aid=210215270476&wid=003&eno=01&mid=s00000016735001159000&mc=1">
              </a>
              <img border="0" width="1" height="1" src="https://www10.a8.net/0.gif?a8mat=3H5N52+7VEE9U+3L4M+6WEWH" alt="">
            </div>
            <div class="post-heading">
              <h1><?php the_title(); ?></h1>
              <img src="<?= esc_url($img[0]); ?>" alt="アイキャッチ画像">
            </div>
            <div <?php post_class(); ?>>
              <?php the_content(); ?>
              <div class="post-comment-btn">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/comment.png" alt="コメントアイコン">
                <span class="count-box"><?= get_comments_number(); ?></span>
              </div>
              <div class="post-comment-area">
                <?php comments_template(); ?>
                <div class="post-ad">
                  <a href="//af.moshimo.com/af/c/click?a_id=2453679&p_id=1765&pc_id=3376&pl_id=25648&guid=ON" rel="nofollow" referrerpolicy="no-referrer-when-downgrade"><img src="//image.moshimo.com/af-img/1115/000000025648.png" width="300" height="250" style="border:none;"></a><img src="//i.moshimo.com/af/i/impression?a_id=2453679&p_id=1765&pc_id=3376&pl_id=25648" width="1" height="1" style="border:none;">
                </div>
              </div>
            </div>
            <div class="row post-pagination">
              <?php the_next_post_link(); ?>
              <?php the_prev_post_link(); ?>
            </div>
            <div class="post-recommend">
              <h4>オススメ記事</h4>
              <div class="row">
                <?php $recommend_posts = get_recommend_posts(); ?>
                <div class="col-12 col-sm-6">
                  <a href="//af.moshimo.com/af/c/click?a_id=2453679&p_id=1765&pc_id=3376&pl_id=25648&guid=ON" rel="nofollow" referrerpolicy="no-referrer-when-downgrade">
                    <div class="card post-related-card">
                      <img alt="テックキャンプ広告" src="//image.moshimo.com/af-img/1115/000000025648.png">
                    </div>
                  </a>
                  <img src="//i.moshimo.com/af/i/impression?a_id=2453679&p_id=1765&pc_id=3376&pl_id=25648" width="1" height="1" style="border:none;">
                </div>
                <?php foreach($recommend_posts as $post): setup_postdata($post); ?>
                <div class="col-12 col-sm-6">
                  <a href="<?php the_permalink(); ?>">
                    <div class="card post-recommend-card">
                      <?php the_thumbnail($post->ID); ?>
                      <div class="card-body">
                        <p class="card-text"><?php trim_title_or_default(get_the_title(), 50); ?></p>
                      </div>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="post-related">
              <h4>関連記事</h4>
              <div class="row">
                <?php $related_posts = get_related_posts($category[0]->term_id); ?>
                <?php foreach($related_posts as $post): setup_postdata($post); ?>
                <div class="col-12 col-sm-6">
                  <a href="<?php the_permalink(); ?>">
                    <div class="card post-related-card">
                      <?php the_thumbnail($post->ID); ?>
                      <div class="card-body">
                        <p class="card-text"><?php trim_title_or_default(get_the_title(), 50); ?></p>
                      </div>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>
                <div class="col-12 col-sm-6">
                  <a href="https://px.a8.net/svt/ejp?a8mat=3H5N52+7VEE9U+3L4M+669JL" rel="nofollow">
                    <div class="card post-related-card">
                      <img alt="udemy広告" src="https://www29.a8.net/svt/bgt?aid=210215270476&wid=003&eno=01&mid=s00000016735001037000&mc=1">
                    </div>
                  </a>
                  <img border="0" width="1" height="1" src="https://www17.a8.net/0.gif?a8mat=3H5N52+7VEE9U+3L4M+669JL" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php endwhile; ?>

  <?php else: ?>

    <p>記事が見つかりませんでした</p>

  <?php endif; ?>


  <?php get_footer(); ?>

</body>

</html>
