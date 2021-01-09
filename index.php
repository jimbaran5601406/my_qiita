<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <?php get_header(); ?>
    </head>

    <body id="page-top">

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

            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">Interests</h2>
                    <p>Apart from being a web developer, I enjoy most of my time being outdoors. In the winter, I am an avid skier and novice ice climber. During the warmer months here in Colorado, I enjoy mountain biking, free climbing, and kayaking.</p>
                    <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.</p>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Certifications  -->
            <?php get_template_part('certifications'); ?>
        </div>

        <?php get_footer(); ?>

    </body>
</html>
