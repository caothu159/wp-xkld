<?php

update_option( 'widget_text', array(
    1 => array(
        'title'  => '',
        'text'   => 'TRUNG TÂM TUYỂN DỤNG LAO ĐỘNG SINGAPORE',
        'filter' => true,
        'visual' => true,
    ),
    2 => array(
        'title'  => '',
        'text'   => 'Địa chỉ 1: Toà nhà AC, số 3 ngõ 78 Duy Tân, Cầu Giấy, Hà Nội

Địa chỉ 2: số 298 đường Cầu Diễn, phường Minh Khai, quận Bắc Từ Liêm, Hà Nội

Địa chỉ 3: Tháp CEO, đường Phạm Hùng, quận Nam Từ Liêm, Hà Nội

Địa chỉ 4: Tòa nhà MD Complex Tower, 68 Nguyễn Cơ Thạch, Từ Liêm, Hà Nội

Điện thoại: 19006546 hoặc 02439728234

Email: info@viet-nhat.com',
        'filter' => true,
        'visual' => true,
    )
) );

$active_widgets                    = get_option( 'sidebars_widgets' );
$active_widgets['sidebar-title']   = array(
    'text-1',
);
$active_widgets['sidebar-address'] = array(
    'text-2',
);

update_option( 'sidebars_widgets', $active_widgets );
