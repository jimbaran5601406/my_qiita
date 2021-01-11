<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <?php get_header(); ?>
    </head>

    <body id="page-top">
        <div id="loading">
            <div class="loader"></div>
        </div>

        <div id="content">
            <?php get_template_part('template-parts/navigation'); ?>

            <!-- Page Content-->
            <div class="container-fluid p-0">
                <!-- About-->
                <?php get_template_part('about'); ?>

                <!-- Career-->
                <?php get_template_part('career'); ?>

                <!-- Blog-->
                <?php get_template_part('page'); ?>

                <!-- Skills-->
                <?php get_template_part('skills'); ?>

                <!-- Portfolios-->
                <?php get_template_part('portfolios'); ?>

                <hr class="m-0" />
                <!-- Certifications  -->
                <?php get_template_part('certifications'); ?>
            </div>
        </div>

        <?php get_footer(); ?>

    </body>
</html>
