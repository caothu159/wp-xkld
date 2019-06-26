<?php get_header(); ?>

    <section id="contact-primary" class="content-area contact-content-area">
        <main id="contact-main" class="site-main contact-main">

            <?php

            /* Start the Loop */
            while ( have_posts() ):
                the_post();

                get_template_part( 'template-parts/content/page', 'contact' );

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
