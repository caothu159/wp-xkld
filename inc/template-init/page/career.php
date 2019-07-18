<?php

//while ( get_page_by_path( 'career' ) != null ) {
//    wp_delete_post( get_page_by_path( 'career' )->ID, true );
//}
if ( get_page_by_path( 'career' ) != null ) {
    return;
}
create_pages_fly( 'career', <<<EOT
<h2 class="text-center"><strong>Quy trình tuyển dụng</strong></h2>
<ul>
 <li><span>TIẾP NHẬN HỒ SƠ</span>Cán bộ hướng dẫn Thực tập sinh điền đầy đủ thông tin trong biểu mẫu và chụp ảnh hồ sơ.</li>
<li><span>KHÁM SỨC KHỎE</span>Thực tập sinh khám sức khỏe đảm bảo tại bệnh viện theo đúng tiêu chuẩn.</li>
<li><span>THI TUYỂN</span>Nghiệp đoàn phỏng vấn trực tiếp hoặc phỏng vấn trực tuyến. Đối với một số đơn hàng, cần kiểm tra kỹ năng, tay nghề thì sẽ thi tuyển.</li>
<li><span>ĐÀO TẠO CHUYÊN SÂU</span>Thực tập sinh trúng tuyển được tham gia đào tạo chuyên sâu về tay nghề, tiếng Nhật, tác phong và giáo dục định hướng.</li>
<li><span>XUẤT CẢNH</span>Xuất cảnh theo lịch trình định sẵn, mọi thủ tục xuất cảnh sẽ được hướng dẫn và hỗ trợ.</li>
</ul>
EOT
    , 'Quy trình tuyển dụng' );
