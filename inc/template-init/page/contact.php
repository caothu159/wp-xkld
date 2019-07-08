<?php

while ( get_page_by_title( 'contact' ) != null ) {
    wp_delete_post( get_page_by_title( 'contact' )->ID, true );
}
create_pages_fly( 'contact' );
