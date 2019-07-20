<?php
/**
 * Template Name: Trade Page
 *
 * @package WordPress
 * @subpackage XKLD
 */

get_header();
$args = array(
    'post_type' => 'job',
); ?>

    <section id="primary" class="content-area trade-content-area container">
        <main id="main" class="site-main trade-site-main">

            <?php
            $wp_query = new WP_Query( $args );
            if ( $wp_query->have_posts() ) {

                while ( $wp_query->have_posts() ) {
                    $wp_query->the_post();

                    get_template_part( 'template-parts/content/trade', 'excerpt' );

                }
            } else {
                get_template_part( 'template-parts/content/content', 'none' );
            }
            ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php get_footer();
