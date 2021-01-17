<?php
/**
 * My Qiita WordPress Theme
 * @author: Kei Funatsuya
 * @link: https://myqiita.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
?>
<?php
$args = array(
    'posts_per_page' => 10, // 表示する投稿数
    'post_type' => 'certifications', // 取得する投稿タイプのスラッグ
  );

$certifications_posts = get_posts($args);
?>

<section class="resume-section" id="certifications">
    <div class="resume-section-content">
        <h2 class="mb-5">Certifications</h2>
        <?php if($certifications_posts): ?>
            <?php foreach($certifications_posts as $post): ?>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5" data-aos='zoom-in-downp'>
                    <div class="flex-grow-1">
                        <h3 class="mb-0 certification-title"><i class="fas fa-trophy text-warning"></i> <?= the_title(); ?></h3>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary"><?= post_custom('date'); ?></span></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>資格が見つかりませんでした</p>
        <?php endif; ?>
    </div>
</section>