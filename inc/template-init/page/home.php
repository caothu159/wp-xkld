<?php

while ( get_page_by_title( 'home' ) != null ) {
    wp_delete_post( get_page_by_title( 'home' )->ID, true );
}
create_pages_fly( 'home' );
