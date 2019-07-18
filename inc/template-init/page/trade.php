<?php

while ( get_page_by_path( 'trade' ) != null ) {
    wp_delete_post( get_page_by_path( 'trade' )->ID, true );
}
if ( get_page_by_path( 'nganh-nghe' ) != null ) {
    return;
}
create_pages_fly( 'nganh-nghe', <<<EOT
<h3>Danh sách đơn hàng</h3>
EOT
    , 'Đơn hàng đi Singapore' );
