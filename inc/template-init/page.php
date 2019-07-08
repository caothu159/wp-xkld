<?php

get_template_part( 'inc/template-init/page/home' );
get_template_part( 'inc/template-init/page/contact' );
get_template_part( 'inc/template-init/page/about' );
get_template_part( 'inc/template-init/page/quy-trinh' );

function create_pages_fly( $page_name, $page_content = 'Starter content' ) {
    // Insert the post into the database
    wp_insert_post( array(
        'post_title'   => $page_name,
        'post_content' => $page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_type'    => 'page',
        'post_name'    => $page_name
    ) );
}
