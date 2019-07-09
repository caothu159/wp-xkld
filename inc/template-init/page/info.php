<?php
while ( get_page_by_path( 'info' ) != null ) {
    wp_delete_post( get_page_by_path( 'info' )->ID, true );
}
create_pages_fly( 'info', <<<EOT
<h3>Phỏng vấn tuyển dụng Xuất khẩu lao động Nhật Bản - Những điều cần lưu ý</h3>
<ul>
<li>Xuất khẩu lao động Nhật Bản cần những điều kiện gì?</li>
<li>Lương trung bình xuất khẩu lao động Nhật Bản là bao nhiêu?</li>
<li>Hỗ trợ vay vốn ngân hàng xuất khẩu lao động Nhật Bản không cần thế chấp</li>
<li>Quy trình tuyển dụng xuất khẩu lao động Nhật Bản.</li>
<li>Thời gian đi xuất khẩu lao động Nhật Bản là bao lâu?</li>
</ul>
EOT
    , 'Thông tin nên biết khi đi XKLĐ Nhật Bản' );
