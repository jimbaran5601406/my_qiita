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
          </div>
          <div class="col-lg-8 col-md-10 mx-auto">
            <div <?php post_class(); ?>>
              <?php the_content(); ?>
            </div>
            <?php comments_template(); ?>
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
