<?php
/**
 * My Qiita WordPress Theme
 * @author: Kei Funatsuya
 * @link: https://myqiita.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
?>
<!-- The intention of this action is to allow people to add things – like a <script> tag – directly inside the body of a page. -->
<?php wp_body_open(); ?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="<?= esc_url(home_url('/')); ?>">
        <h1 id="site_title" class="d-block d-lg-none"><?php bloginfo('name'); ?></h1>
        <?php if(is_single()): ?>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?= get_template_directory_uri(); ?>/screenshot.png" alt="kf's picture" /></span>
        <?php else: ?>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?= get_template_directory_uri(); ?>/assets/img/profile.jpg" alt="kf's picture" /></span>
        <?php endif; ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <?php
            if(is_single()) {
                the_menu_items_assigned_headings($post->post_content);
            } else {
                the_global_nav();
            }
            ?>
        </ul>
    </div>
</nav>