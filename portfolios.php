<?php
$args = array(
    'post_type' => 'portfolios', // 取得する投稿タイプのスラッグ
  );

$portfolios_posts = get_posts($args);
?>
<section class="resume-section" id="portfolios">
    <div class="resume-section-content">
        <h2 class="mb-5">Portfolios</h2>
        <?php if($portfolios_posts): ?>
        <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php foreach($portfolios_posts as $post): ?>
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img src="<?= post_custom('url') ?>" alt="<?= post_custom('alt') ?>">
                            <div class="swiper-content">
                                <div class="swiper-content-inner">
                                    <?php if(is_mobile()): ?>
                                        <p class="github"><a href="<?= post_custom('github'); ?>"><i class="fab fa-github-square fa-3x"></i></a></p>
                                        <p class="title"><?php the_title(); ?></p>
                                    <?php else: ?>
                                        <p class="title"><?php the_title(); ?></p>
                                        <p class="github"><a href="<?= post_custom('github'); ?>"><?= post_custom('github'); ?></a></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        <?php else: ?>
            <p>ポートフォリオが見つかりませんでした</p>
        <?php endif; ?>
    </div>
</section>