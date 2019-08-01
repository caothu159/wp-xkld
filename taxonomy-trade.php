<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

get_header();
$terms = get_terms( array(
    'taxonomy'   => 'trade',
    'hide_empty' => false
) ); ?>

    <section id="primary" class="content-area trade-content-area container">
        <main id="main" class="site-main trade-site-main">
            <div class="trade-content">
                <?php
                $page_trade = get_page_by_path( 'nganh-nghe' );
                if ( $page_trade ) {
                    setup_postdata( $page_trade );
                    the_content();
                    wp_reset_postdata();
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

            <?php
            if ( have_posts() ) {

                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/trade', 'excerpt' );
                }

            } else {
                get_template_part( 'template-parts/content/content', 'none' );
            }
            ?>

        </main><!-- .site-main -->
    </section><!-- .content-area -->

<?php
get_footer();
