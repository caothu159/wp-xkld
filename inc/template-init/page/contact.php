<?php

while ( get_page_by_title( 'contact' ) != null ) {
    wp_delete_post( get_page_by_title( 'contact' )->ID, true );
}
create_pages_fly( 'contact', <<<EOT
<div class="col-md-5 form-left">
    <h2 class="form-title text-white">Liên hệ<br>với chúng tôi</h2>
    <div class="form_content">
        <input type="text" placeholder="Họ và tên">
        <input type="text" placeholder="Số điện thoại">
        <textarea placeholder="Lời nhắn"></textarea>
        <button type="button"
                class="btn btn-block text-uppercase">
            Gửi lời nhắn
        </button>
    </div>
</div>
<div class="col-md-7 form-right">
    <ul>
        <li>
            <i class="fa fa-map-marker-alt"></i>
            <p>Trung tâm tư vấn xuất khẩu lao động Nhật - Việt</p>
        </li>
        <li>
            <i class="fa fa-phone"></i>
            <p>0986111979 - 02439728234</p>
        </li>
        <li>
            <i class="fa fa-viber"></i>
            <p>0986111979 (Mr Cường)</p>
        </li>
        <li>
            <i class="icon32-zalo-white"></i>
            <p>0986111979 (Mr Cường)</p>
        </li>

        <li class="info">
            <p><i>Nếu bạn không tiện gọi điện hay nhắn tin trao đổi
                    ngay lúc này, đừng ngần ngại để lại thông tin, chúng tôi sẽ gọi lại và tư
                    vấn cho bạn.</i></p>
        </li>
    </ul>
</div>
EOT
);
