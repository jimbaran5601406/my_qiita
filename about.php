<?php
$args = array(
    'post_type' => 'about', // 取得する投稿タイプのスラッグ
  );

$about_post = get_posts($args);
?>

<section class="resume-section" id="about">
    <div class="resume-section-content">
        <?php if($about_post): ?>
            <?php foreach($about_post as $post): ?>
                <h2 class="mb-0"><?= post_custom('first_name'); ?><span class="text-primary"><?= post_custom('last_name') ?></span></h2>
                <div class="subheading mb-5">
                    <?= post_custom('address'); ?> <span class="text-primary"><?= post_custom('email'); ?></span>
                </div>
                <p class="lead mb-5"><?= post_custom('about'); ?> </p>
                <div class="social-icons">
                    <a class="social-icon" href="https://github.com/jimbaran5601406" target="_blank"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="https://twitter.com/jimbaran5601406" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="https://www.instagram.com/jimbaran5601406_" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>情報が見つかりませんでした</p>
        <?php endif; ?>
    </div>
</section>

<hr class="m-0" />