<?php

add_action( 'init', 'check_pages_live' );
function check_pages_live() {
    if ( get_page_by_title( 'about' ) == null ) {
        create_pages_fly( 'about' );
    }
}

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
