<?php
if ( ! is_front_page() ) {
    return;
}

$page_info = get_page_by_path( 'info' );
if ( $page_info ) :
    $post = $page_info;
    setup_postdata( $post ); ?>
    <section id="info-primary" class="content-area info-content-area bg-white">
        <main id="info-main" class="site-main info-main container clearfix">
            <div class="row">

                <?php the_title( '<h1 class="entry-title col-12 text-center">', '</h1>' ); ?><!-- .entry-title -->

                <div class="col-6">
                    <figure class="entry-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </figure><!-- .entry-thumbnail -->
                </div>

                <div class="entry-content col-6">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->

            </div>
        </main><!-- #main -->
    </section><!-- #primary -->

    <?php wp_reset_postdata(); ?>
<?php endif; ?>
