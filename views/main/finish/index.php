<?php
  include_once('views/main/navbar.php');
?>
<div class="container" style="margin-top: 80px">
    <div class="delivery-top-wrap">
        <div class="delivery-top">
            <div class="delivery-top-delivery delivery-top-item">
                <span class="bi bi-cart-fill text-muted fs-5 custom-icon"></span>
            </div>
            <div class="delivery-top-delivery-payment delivery-top-item">
                <span class="bi bi-cash-stack text-muted fs-5 custom-icon"></span>
            </div>
            <div class="delivery-top-delivery-adress delivery-top-item">
                <span class="bi bi-check-circle-fill text-muted fs-5 custom-icon1"></span>
            </div>
        </div>
    </div>
</div>
<section class="finish"
    style="background-image:url('https://img.freepik.com/premium-photo/color-background-nice-wallpaper-card_218381-8031.jpg?w=360');">
    <div class="finish-content">
        <h1>ĐẶT HÀNG THÀNH CÔNG</h1>
        <p>Chào <span style="text-transform:capitalize;color:#ac2f33;">HÀ CU</span>,
            đơn hàng của bạn đã được đặt thành công.</p>
        <p>Đơn hàng của bạn đã được xác nhận tự động.</p>
        <p>Cảm ơn quý khách đã tin dùng sản phẩm của chúng tôi.</p>
        <button style="margin-right:30px;" onclick="window.location.assign('index.php')">VỀ TRANG CHỦ</button>
        <button onclick="window.location.assign('index.php?page_layout=invoice')">XEM HÓA ĐƠN</button>
        <p>Mọi thắc mắc quý khách vui lòng liên hệ hotline <span style="font-size:24px;color:#ac2f33;"><b>0232 985
                    0375</b></span> hoặc chat với kênh hỗ trợ để được hỗ trợ nhanh nhất.</p>
    </div>
</section>
<?php
  include_once('views/main/footer.php');
?>