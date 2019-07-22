<?php
if ( ! is_front_page() ) {
    return;
}
$args = array(
    'post_type' => 'job',
); ?>

<section id="primary" class="trade-content-area container">
    <main id="main" class="trade-site-main row">
        <h1 class="col-12 text-center text-uppercase">Các đơn hàng nổi bật</h1>

        <?php $wp_query = new WP_Query( $args );
        if ( $wp_query->have_posts() ) {

            while ( $wp_query->have_posts() ) {
                $wp_query->the_post();

                get_template_part( 'template-parts/content/trade', 'home' );

            }
        } ?>

        <div class="col-12 mt-3">
            <a class="all-link" href="<?php echo esc_url( get_page_link( get_page_by_path( 'nganh-nghe' ) ) ) ?>">
                <?php _e( 'xem tất cả' ) ?>
            </a>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->
