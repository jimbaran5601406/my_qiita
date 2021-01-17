<?php
/**
 * My Qiita WordPress Theme
 * @author: Kei Funatsuya
 * @link: https://myqiita.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
?>
<section class="resume-section" id="blog">
    <div class="resume-section-content">
        <h2 class="mb-5">Blog</h2>
        <?php if (have_posts()) : ?>
            <?php while(have_posts()): the_post(); ?>
                <div class="post-preview" data-aos='zoom-in-downp'>
                    <a href="<?php the_permalink(); ?>">
                        <h3 class="post-title">
                        <?php trim_title_or_default(get_the_title(), 40); ?>
                        </h3>
                        <h4 class="post-subtitle">
                        <?php the_excerpt(); ?>
                        </h4>
                    </a>
                    <p class="post-meta">
                        <?php the_date(get_option('date_format')); ?>
                    </p>
                </div>
                <hr>
            <?php endwhile; ?>
            <!-- Pager -->
            <div class="clearfix">
                <?= get_prev_pagination(); ?>
                <?= get_next_pagination(); ?>
            </div>
        <?php else : ?>
            <p>記事が見つかりませんでした</p>
        <?php endif; ?>
    </div>
</section>
<hr class="m-0" />
