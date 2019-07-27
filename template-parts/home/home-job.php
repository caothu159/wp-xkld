<?php
if ( ! is_front_page() ) {
    return;
}
$terms = get_terms( array(
    'taxonomy'   => 'trade',
    'hide_empty' => false
) );
?>
<section id="primary" class="trade-content-area container">
    <main id="main" class="trade-site-main row">
        <h1 class="col-12 text-center"><?php _e( 'Các đơn hàng nổi bật' ) ?></h1>

        <ul class="nav nav-pills" id="nav-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" data-toggle="pill" href="#all" role="tab" aria-controls="all"
                   aria-selected="true"><?php _e( 'Tất cả' ) ?></a>
            </li>
            <?php foreach ( $terms as $term ) : ?>
                <li class="nav-item">
                    <a id="<?php _e( $term->slug ) ?>-tab" href="#<?php _e( $term->slug ) ?>"
                       aria-controls="<?php _e( $term->slug ) ?>"
                       class="nav-link" data-toggle="pill" role="tab" aria-selected="false">
                        <?php _e( $term->name ) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="col-12">
            <div class="row align-items-stretch tab-content">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <?php $wp_query = new WP_Query( array( 'post_type' => 'job' ) );
                    if ( $wp_query->have_posts() ) {
                        while ( $wp_query->have_posts() ) {
                            $wp_query->the_post();
                            get_template_part( 'template-parts/content/trade', 'home' );
                        }
                        $wp_query->reset_postdata();
                    }
                    unset( $wp_query ); ?>
                </div>
                <?php foreach ( $terms as $term ) : ?>
                    <div id="<?php _e( $term->slug ) ?>" aria-labelledby="<?php _e( $term->slug ) ?>-tab"
                         class="tab-pane fade" role="tabpanel">
                        <?php
                        $wp_query = new WP_Query( array(
                            'post_type'      => 'job',
                            'posts_per_page' => 6,
                            'paged'          => 1,
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => $term->taxonomy,
                                    'field'    => 'id',
                                    'terms'    => $term->term_id,
                                )
                            )
                        ) );
                        if ( $wp_query->have_posts() ) {
                            while ( $wp_query->have_posts() ) {
                                $wp_query->the_post();
                                get_template_part( 'template-parts/content/trade', 'home' );
                            }
                            $wp_query->reset_postdata();
                        }
                        unset( $wp_query ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-12 mt-3">
            <a class="all-link" href="<?php echo esc_url( get_page_link( get_page_by_path( 'nganh-nghe' ) ) ) ?>">
                <?php _e( 'xem tất cả' ) ?>
            </a>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->
