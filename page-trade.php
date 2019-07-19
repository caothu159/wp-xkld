<?php
/**
 * Template Name: Trade Page
 *
 * @package WordPress
 * @subpackage XKLD
 */

get_header();

//$taxonomy = 'trade'; // this is the name of the taxonomy
//$terms    = get_terms( $taxonomy, 'orderby=count&hide_empty=1' );
$args = array(
    'post_type' => 'job',
//    'tax_query' => array(
//        array(
//            'taxonomy' => $taxonomy,
//            'field'    => 'slug',
//            'terms'    => wp_list_pluck( $terms, 'slug' )
//        )
//    )
);

$wp_query = new WP_Query( $args );
if ( $wp_query->have_posts() ) :
    while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile;
endif;

get_footer();
