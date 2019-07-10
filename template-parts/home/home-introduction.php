<?php
if ( ! is_front_page() ) {
    return;
}

$page_introduction = get_page_by_path( 'home' );
if ( $page_introduction ) :
    $post = $page_introduction;
    setup_postdata( $post ); ?>
    <section id="introduction-primary" class="content-area introduction-content-area bg-white">
        <main id="introduction-main" class="site-main introduction-main container clearfix">
            <div class="row">

                <?php the_content(); ?>

            </div>
        </main><!-- #main -->
    </section><!-- #primary -->

    <?php wp_reset_postdata(); ?>
<?php endif; ?>
