<?php
if ( ! is_front_page() ) {
    return;
}
?>
<?php get_template_part( 'template-parts/home/home', 'slider' ); ?>
<?php get_template_part( 'template-parts/home/home', 'introduction' ); ?>
<?php get_template_part( 'template-parts/home/home', 'job' ); ?>
<?php get_template_part( 'template-parts/home/home', 'info' ); ?>
<?php get_template_part( 'template-parts/home/home', 'career' ); ?>
<?php get_template_part( 'template-parts/home/home', 'contact' ); ?>
