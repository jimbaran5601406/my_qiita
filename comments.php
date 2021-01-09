<div id="comment_area">
    <?php if(have_comments()): ?>
        <h3 id="comments">コメント一覧</h3>
        <ol class="commets-list">
            <?php wp_list_comments('avatar_size=40'); ?>
        </ol>
    <?php endif; ?>
    <?php comment_form(); ?>
</div>