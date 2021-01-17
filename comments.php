<?php
/**
 * My Qiita WordPress Theme
 * @author: Kei Funatsuya
 * @link: https://myqiita.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
?>
<?php if ( comments_open() ) : ?>
    <div class="post-comment-hide-btn">&times;</div>
    <?php if(have_comments()): ?>
        <h3 id="comments">コメント一覧</h3>
        <ol class="comments-list">
            <?php wp_list_comments(); ?>
        </ol>
    <?php endif; ?>
    <?php comment_form(); ?>
<?php endif; ?>