<?php
/**
 * My Qiita WordPress Theme
 * @author: Kei Funatsuya
 * @link: https://myqiita.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

$args = array(
    'posts_per_page' => 20, // 表示する投稿数
    'post_type' => 'skills', // 取得する投稿タイプのスラッグ
    'orderby'   => 'date', // 順序基準
	'order'     => 'ASC', // 順序
  );

$skills_posts = get_posts($args);
?>
<section class="resume-section" id="skills">
    <div class="resume-section-content">
        <h2 class="mb-5">Skills</h2>
        <div class="subheading mb-3">Programming Languages & Tools</div>
        <?php if($skills_posts): ?>
            <ul class="list-inline dev-icons">
            <?php foreach($skills_posts as $key => $post): ?>
                <span>
                    <li class="list-inline-item" data-aos='zoom-in-downp' data-aos-delay="<?= $key ?>00"><i class="fab <?= post_custom('font-awesome-icon-name'); ?>"></i></li>
                    <p><?php the_title(); ?>の経験年数：<?= post_custom('term') ?> 年</p>
                </span>
            <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>資格が見つかりませんでした</p>
        <?php endif; ?>
    </div>
</section>
<hr class="m-0" />