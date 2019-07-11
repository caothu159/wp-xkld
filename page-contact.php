<?php get_header();

while ( have_posts() ):
    the_post(); ?>

    <section id="contact-primary" class="content-area contact-content-area">
        <main id="contact-main" class="site-main contact-main">

            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="row form">

                            <?php the_content(); ?>

                        </div>
                    </div>
                </div>
            </div>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
endwhile; // End of the loop.

get_footer();
