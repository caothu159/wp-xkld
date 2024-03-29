<?php
if ( ! is_front_page() ) {
    return;
}
$page_contact = get_page_by_path( 'contact' );
if ( $page_contact ) :
    $post = $page_contact;
    setup_postdata( $post ); ?>

    <section id="contact-primary" class="contact-content-area">
        <main id="contact-main" class="contact-main">

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

    <?php wp_reset_postdata(); ?>
<?php endif; ?>
