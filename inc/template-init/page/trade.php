<?php

//while ( get_page_by_path( 'nganh-nghe' ) != null ) {
//    wp_delete_post( get_page_by_path( 'nganh-nghe' )->ID, true );
//}
if ( get_page_by_path( 'nganh-nghe' ) != null ) {
    return;
}
$page_ID = create_pages_fly( 'nganh-nghe', <<<EOT
<h3>Danh sách đơn hàng</h3>
EOT
    , 'Đơn hàng đi Singapore' );

if ( ! add_post_meta( $page_ID, '_wp_page_template', 'page-trade.php', true ) ) {
    update_post_meta( $page_ID, '_wp_page_template', 'page-trade.php' );
}
