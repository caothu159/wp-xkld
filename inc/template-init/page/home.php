<?php

while ( get_page_by_path( 'home' ) != null ) {
    wp_delete_post( get_page_by_path( 'home' )->ID, true );
}
create_pages_fly( 'home', <<<EOT
<ul>
<li><span>#1</span>Lệ phí xuất khẩu lao động đi Nhật Bản thấp nhất</li>
<li><span>5.000+</span>Trên 5000 người đi xuất khẩu lao động mỗi năm</li>
<li><span>200+</span>Trên 200 đơn hàng đi xuất khẩu lao động mỗi tháng</li>
<li><span>99.9%</span>Trên 99% số người đi xuất khẩu lao động Nhật Bản có công việc ổn định</li>
</ul>
EOT
    , 'Trang chủ' );
// introduction
