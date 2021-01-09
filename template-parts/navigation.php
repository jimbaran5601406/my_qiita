<!-- The intention of this action is to allow people to add things – like a <script> tag – directly inside the body of a page. -->
<?php wp_body_open(); ?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="<?= esc_url(home_url('/')); ?>">
        <span class="d-block d-lg-none"><?php bloginfo('name'); ?></span>
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
                $menu_name = 'global_nav';
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations[$menu_name]);
                $menu_items = wp_get_nav_menu_items($menu->term_id);
                foreach($menu_items as $item) {
                    echo "<li class='nav-item'><a class='nav-link js-scroll-trigger' href='$item->url'>$item->title</a></li>";
                }
            }
            ?>
        </ul>
    </div>
</nav>