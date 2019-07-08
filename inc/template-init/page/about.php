<?php
while ( get_page_by_title( 'about' ) != null ) {
    wp_delete_post( get_page_by_title( 'about' )->ID, true );
}

create_pages_fly( 'about', <<<EOT
<p><strong>GIỚI THIỆU CÔNG TY</strong></p>
<br />
<br />
<p><span>Chúng tôi là đơn vị cung ứng nguồn nhân lực xuất khẩu lao động, với mong muốn mang tới cho người lao động Việt Nam sự an tâm, tin tưởng về những đơn hàng đi Nhật Bản.</span></p>
<p><span>Chúng tôi luôn cam kết : KHÔNG THU PHÍ MÔI GIỚI, chi phí thấp, thi tuyển liên tục và xuất cảnh nhanh chóng. Người lao động có thu nhập cao, ổn định, được đóng bảo hiểm y tế, bảo hiểm xã hội đầy đủ theo quy định của nước sở tại.</span></p>
<p><strong>CÁC LĨNH VỰC HOẠT ĐỘNG CHÍNH CỦA CHÚNG TÔI</strong></p>
<ol>
<li><span>Tổ chức xuất khẩu lao động và đưa chuyên gia đi làm việc có thời hạn ở nước ngoài;</span></li>
<li><span>Dịch vụ hỗ trợ giáo dục:</span></li>
</ol>
<ul>
<li><span>Tổ chức bồi dưỡng cán bộ quản lý, khoa học – kỹ thuật và đào tạo nghề ngắn hạn theo hợp đồng với các cơ quan, doanh nghiệp, cá nhân người lao động ở trong và ngoài nước theo quy định của pháp luật;</span></li>
<li><span>Tuyển chọn và tổ chức đào tạo, bồi dưỡng cán bộ, công nhân theo hợp đồng với các cơ quan, doanh nghiệp, cá nhân người lao động trong và ngoài nước để đưa đi làm việc tại nước ngoài;</span></li>
<li><span>Dịch vụ tư vấn du học.</span></li>
</ul>
<p><strong>TẦM NHÌN</strong></p>
<ul>
<li><span>Xây dựng công ty trở thành công ty cung ứng nguồn lao động hàng đầu tại Việt Nam.</span></li>
<li><span>Cung cấp nhân lực có chất lượng cho đối tác Nhật Bản</span></li>
<li><span>Định hướng cho thế hệ trẻ khởi nghiệp vững vàng, đáp ứng hoàn toàn về nguồn nhân lực có trình độ cho xã hội và hội nhập với Quốc tế.</span></li>
<li><span>Luôn hướng đến chinh phục mục tiêu phát triển bền vững và là sự lựa chọn hàng đầu cho các đối tác và người lao động.</span></li>
</ul>
<p><strong>SỨ MỆNH</strong></p>
<ul>
<li><span>Nỗ lực phấn đấu để xây dựng niềm tin bền vững với các đối tác và người lao động.</span></li>
<li><span>Mang lại những giá trị và sự hài lòng cho người lao động bằng những đơn hàng có chất lượng tốt nhất với chi phí hợp lý.</span></li>
<li><span>Luôn đồng hành để bảo vệ quyền và lợi ích chính đáng của người lao động tại Nhật Bản.</span></li>
<li><span>Tạo dựng một môi trường làm việc chuyên nghiệp, năng động và sáng tạo mà ở đó mỗi thành viên làm việc tận tụy hết mình, nơi hội tụ và phát triển nhân tài.</span></li>
</ul>
<p><strong>GIÁ TRỊ CỐT LÕI</strong></p>
<ul>
 <li><span>Người lao động là tài sản có giá trị và là nguồn sức mạnh của công ty.</span></li>
<li><span>Đoàn kết chính là chất keo gắn kết, tập hợp các nguồn lực về con người và vật chất cùng hướng tới mục tiêu trở thành công ty cung ứng nguồn lao động hàng đầu tại Việt Nam.</span></li>
<li><span>Luôn lấy chữ tín, sự tận tâm với công việc nền tảng cho mọi hoạt động kinh doanh của công ty.</span></li>
<li><span>Lấy chất lượng làm cam kết với đối tác và người lao động.</span></li>
</ul>
<p><span>Mọi chi tiết xin liên hệ</span></p>
<p><strong>TRUNG TÂM XUẤT KHẨU LAO ĐỘNG NHẬT BẢN</strong></p>
<p><span>Tòa nhà AC, số 3 ngõ 78 Duy Tân, phường Dịch Vọng Hậu, quận Cầu Giấy, Hà Nội</span></p>
<p><span>Hotline: 0986111979</span></p>
<p><span>Điện thoại: 0243 9728 234 - 0986111979</span></p>
EOT
);
