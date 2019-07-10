<?php
if ( ! is_front_page() ) {
    return;
}

$page_career = get_page_by_path( 'career' );
if ( $page_career ) :
    $post = $page_career;
    setup_postdata( $post ); ?>

    <section id="career-primary" class="content-area career-content-area"
             style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')">
        <main id="career-main" class="site-main career-main container text-white clearfix">

            <?php the_content(); ?>

        </main><!-- #main -->
    </section><!-- #primary -->

    <?php wp_reset_postdata(); ?>
<?php endif; ?>
