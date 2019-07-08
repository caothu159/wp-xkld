<?php
if ( ! is_front_page() ) {
    return;
}
?>
<?php get_template_part( 'template-parts/home/home', 'slider' ); ?>
<?php get_template_part( 'template-parts/home/home', 'quy-trinh' ); ?>
<?php get_template_part( 'template-parts/home/home', 'contact' ); ?>
