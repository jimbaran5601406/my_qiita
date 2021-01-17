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