<?php
if ( ! is_front_page() ) {
    return;
}
?>
<section id="contact-primary" class="content-area contact-content-area">
    <main id="contact-main" class="site-main contact-main">

        <?php get_template_part( 'template-parts/content/page', 'contact' ); ?>

    </main><!-- #main -->
</section><!-- #primary -->
