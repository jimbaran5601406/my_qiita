<?php
$args = array(
    'posts_per_page' => 10, // 表示する投稿数
    'post_type' => 'certification', // 取得する投稿タイプのスラッグ
  );

$certification_posts = get_posts($args);
?>
<section class="resume-section" id="certifications">
    <div class="resume-section-content">
        <h2 class="mb-5">Certifications</h2>
        <ul class="fa-ul mb-0">
            <?php if($certification_posts): ?>
                <?php foreach($certification_posts as $post): ?>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><i class="fas fa-trophy text-warning"></i> <?= the_title(); ?></h3>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?= post_custom('term'); ?></span></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>資格が見つかりませんでした</p>
            <?php endif; ?>
        </ul>
    </div>
</section>