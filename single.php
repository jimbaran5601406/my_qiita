<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

  <?php get_header(); ?>

</head>

<body <?php body_class(); ?>>

  <?php get_template_part('template-parts/navigation'); ?>

  <?php if(have_posts()): ?>

    <?php while(have_posts()): the_post();?>

      <?php
      $img = get_eyecatch_with_default();
      ?>

      <div class="container single-container">
        <div class="row">
          <div class="col-lg-8 col-md-12 mx-auto">
            <div class="post-heading">
              <h1><?php the_title(); ?></h1>
              <img src="<?= esc_url($img[0]); ?>" alt="アイキャッチ画像">
              <div class="meta">
                <?php the_author(); ?> - <?php the_date(); ?>
              </div>
            </div>
            <div <?php post_class(); ?>>
              <?php the_content(); ?>
            </div>
            <div class="row post-pagination">
              <?php the_next_post_link(); ?>
              <?php the_prev_post_link(); ?>
            </div>
            <div class="post-recommend">
              <h4>オススメ記事</h4>
              <div class="row">
                <?php $recommend_posts = get_recommend_posts(); ?>
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
