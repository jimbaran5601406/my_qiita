<?php
$args = array(
    'posts_per_page' => 10, // 表示する投稿数
    'post_type' => 'career', // 取得する投稿タイプのスラッグ
  );

$career_posts = get_posts($args);
?>
<!-- Career-->
<section class="resume-section" id="career">
    <div class="resume-section-content">
        <h2 class="mb-5">Career</h2>

        <?php if($career_posts): ?>
            <?php foreach($career_posts as $post): ?>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0"><?= the_title(); ?></h3>
                        <div class="subheading mb-3"><?= the_subtitle(); ?></div>
                        <p><?= the_content(); ?></p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary"><?= post_custom('term'); ?></span></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>キャリアが見つかりませんでした</p>
        <?php endif; ?>
    </div>
</section>
<hr class="m-0" />