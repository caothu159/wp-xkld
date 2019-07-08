<?php
if ( ! is_front_page() ) {
    return;
}
?>
<section id="quy-trinh-primary" class="content-area quy-trinh-content-area">
    <main id="quy-trinh-main" class="site-main quy-trinh-main container">

        <?php
        global $post;
        $page_quy_trinh = get_page_by_title( 'quy trinh' );
        if ( $page_quy_trinh ) : setup_postdata( $page_quy_trinh ); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->

            </article><!-- #post-<?php the_ID(); ?> -->

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </main><!-- #main -->
</section><!-- #primary -->
