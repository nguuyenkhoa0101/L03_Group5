<?php include_once('views/main/navbar.php'); ?>
<form action="index.php?page=main&controller=delivery&action=add" method="post" id="form1" autocomplete="off">
    <section class="delivery">
        <div class="container">
            <div class="delivery-top-wrap">
                <div class="delivery-top">
                    <div class="delivery-top-delivery delivery-top-item"> <span
                            class="bi bi-cart-fill text-muted fs-5 custom-icon"></span> </div>
                    <div class="delivery-top-delivery-adress delivery-top-item"> <span
                            class="bi bi-cash-stack text-muted fs-5 custom-icon1"></span> </div>
                    <div class="delivery-top-delivery-payment delivery-top-item"> <span
                            class="bi bi-check-circle-fill text-muted fs-5 custom-icon"></span> </div>
                </div>
            </div>
        </div>
        <div class="container1">
            <div class="delivery-content row">
                <div class="delivery-content-left">
                    <div class="address-method-delivery" style="display: flex;">
                        <div class="address-delivery">
                            <h3>Địa chỉ giao hàng</h3>

                            <div class="input-address"> <input type="text" name="name" placeholder="Họ tên"
                                    style="width:221px;margin-right:12px" required autofocus> <input type="tel"
                                    name="phone-number" placeholder="Số điện thoại" pattern="[0-9]{10}"
                                    style="width:221px;" required><br> <input type="email" name="email"
                                    placeholder="Email" style="width:100%;" required><br> <input type="text"
                                    name="province" placeholder="Tỉnh/Thành phố" style="width:221px;margin-right:12px"
                                    required> <input type="text" name="district" placeholder="Quận/Huyện"
                                    style="width:221px;" required><br> <input type="text" name="ward"
                                    placeholder="Phường xã" style="width:100%;" required><br> <input type="text"
                                    name="address-detail" placeholder="Địa chỉ chi tiết" style="width:100%;" required>
                            </div>

                        </div>
                        <div class="method-delivery" style="position: relative;">
                            <h3>Phương thức giao hàng</h3>
                            <div style="display: flex; align-items: center;">
                                <p style="margin-right: 10px; display: flex;"><i class="bi bi-check-circle"></i> &nbsp
                                    Express delivery <img src="images/ship.png" alt="momo logo" style="width: 60px;">
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <h3>Phương thức thanh toán</h3>
                        <div class="payment-method-content">
                            <p style="font-size:15px;color:#6c6d70;line-height:16px;margin-bottom:20px;">Mọi giao dịch
                                đều
                                được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                            <div class="payment-method-options" style="position:relative;">
                                <input type="radio" name="payment_method" value="credit-card" checked>
                                <label>Thanh toán khi nhận hàng (COD)</label>
                            </div>
                            <div class="payment-method-options" style="position:relative;">
                                <input type="radio" name="payment_method" value="ATM-card">
                                <label>Thanh toán qua QR Code</label>
                                <img src="images/QG.png" alt="momo logo">
                            </div>
                            <a href="javascript:void(0);" id="paymentLink" style="display: none;" data-bs-toggle="modal"
                                data-bs-target="#payModal">Thanh toán tại đây</a>
                        </div>
                    </div>
                    <div class=" show-product-button">
                        <button onclick="showProductContent()">Hiển thị giỏ hàng</button>
                    </div>
                    <div class="show-product-content" id="yourcart">
                        <h2>Giỏ hàng của bạn</h2>
                        <div class="show-product">
                            <table>
                                <tr>
                                    <th style="width:180px;">SẢN PHẨM</th>
                                    <th style="width:280px;">TÊN SẢN PHẨM</th>
                                    <th>MÀU</th>
                                    <th style="width:80px;padding-left:30px;">SIZE</th>
                                    <th>SỐ LƯỢNG</th>
                                    <th>THÀNH TIỀN</th>
                                </tr>
                                <tr>
                                    <td><img src="images/" alt="productImage"></td>
                                    <td>
                                        <p style="text-transform:capitalize;text-align:center;">
                                        </p>
                                    </td>
                                    <td><img src="images/colors/" alt="productColor"></td>
                                    <td>
                                        <p></p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                    <td>
                                        <p><strong></strong></p>
                                    </td>
                                </tr>

                                ?>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="delivery-content-right">
                    <div class="order-summary">
                        <p style="font-size:23px;font-weight:550;color:#221F20;margin-bottom:18px;">Tóm tắt đơn hàng
                        </p>
                        <table>
                            <tr>
                                <td>Tổng tiền hàng</td>
                                <td>đ</td>
                            </tr>
                            <tr>
                                <td>Tạm tính</td>
                                <td>đ</td>
                            </tr>
                            <tr>
                                <td>Phí vận chuyển</td>
                                <td>35.000 đ</td>
                            </tr>
                            <tr>
                                <td>Tiền thanh toán</td>
                                <td style="color: black;font-size:18px">
                                    <strong>đ</strong>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="delivery-content-right-button">
                        <input type="submit" name="submit" value="THANH TOÁN & MUA HÀNG" id="btnThanhToan">
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông tin chuyển khoản</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="qr-select">Chọn QR code:</label>
                            <select class="form-control" id="qr-select">
                                <option value="qr1">Momo</option>
                                <option value="qr2">Ngân hàng</option>
                            </select>
                        </div>
                        <div id="qr1" style="text-align: center; margin-top: 30px;">
                            <img src="https://homepage.momocdn.net/img/momo-upload-api-221003112148-638003929084418981.png"
                                alt="QR Code 1" width="200" height="200">
                        </div>
                        <div id="qr2" style="text-align: center; margin-top: 30px; display: none;">
                            <img src="https://img.vietqr.io/image/vietinbank-113366668888-compact.jpg" alt="QR Code 2"
                                width="200" height="200">
                        </div>
                        <div class="form-group">
                            <label>Minh chứng chuyển khoản</label>&nbsp;
                            <input type="file" class="form-control my-2" name="fileToUpload" id="fileToUpload" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng lại</button>
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lắng nghe sự kiện click
    document.querySelector('input[name="payment_method"][value="ATM-card"]').addEventListener('click',
        function() {
            // Hiển thị chữ "Thanh toán tại đây" khi chọn phương thức thanh toán bằng chuyển khoản
            document.getElementById('paymentLink').style.display = 'block';
        });
    document.querySelector('input[name="payment_method"][value="credit-card"]').addEventListener('click',
        function() {
            // Ẩn chữ "Thanh toán tại đây" khi chọn lại phương thức thanh toán khi nhận hàng
            document.getElementById('paymentLink').style.display = 'none';
        });
});

document.getElementById('qr-select').addEventListener('change', function() {
    var selectedQR = this.value;
    if (selectedQR === 'qr1') {
        document.getElementById('qr1').style.display = 'block';
        document.getElementById('qr2').style.display = 'none';
    } else if (selectedQR === 'qr2') {
        document.getElementById('qr1').style.display = 'none';
        document.getElementById('qr2').style.display = 'block';
    }
});
</script>

<?php
include_once('views/main/footer.php');
?>