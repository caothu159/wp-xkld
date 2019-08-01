<?php
/**
 * Template Name: Trade Page
 *
 * @package WordPress
 * @subpackage XKLD
 */

get_header();
$terms = get_terms( array(
    'taxonomy'   => 'trade',
    'hide_empty' => false
) ); ?>

    <section id="primary" class="content-area trade-content-area container">
        <main id="main" class="site-main trade-site-main">
            <div class="trade-content">
                <?php while ( have_posts() ) {
                    the_post();
                    the_content();
                } ?>
            </div>

            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active"
                       href="<?php echo esc_url( get_page_link( get_page_by_path( 'nganh-nghe' ) ) ) ?>">
                        <?php _e( 'Tất cả' ) ?>
                    </a>
                </li>
                <?php foreach ( $terms as $term ) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php _e( get_term_link( $term ) ) ?>">
                            <?php _e( $term->name ) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <?php $wp_query = new WP_Query( array( 'post_type' => 'job' ) );
            if ( $wp_query->have_posts() ) {

                while ( $wp_query->have_posts() ) {
                    $wp_query->the_post();

                    get_template_part( 'template-parts/content/trade', 'excerpt' );
                }
                $wp_query->reset_postdata();
            } else {
                get_template_part( 'template-parts/content/content', 'none' );
            } ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php get_footer();
