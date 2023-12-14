<?php
include_once('views/main/navbar.php');
include_once('controllers/main/cart_controller.php');

$data = new CartController;
$order = $data->Listorder();

?>

<section class="log" style="margin-top: 100px">
    <h3 class="text-center text-uppercase">Tra cứu đơn hàng Routine của bạn</h3>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <form id="searchForm" method="POST" action="">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Nhập email" name="user_mail">
                        <button class="btn btn-dark" type="submit">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-10 offset-lg-1">
                <table class="table table-bordered  table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tình trạng đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order as $item): ?>
                        <tr>
                            <td><?php echo $item['order_code']; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><img src="<?php echo $item['img']; ?>" style="max-width: 100px; height: auto;"></td>
                            <td><?php echo $item['product_quantity']; ?></td>
                            <td>
                                <?php
                              if ($item['order_status'] == 1) {
                                  echo 'Đã thanh toán';
                              } else {
                               echo 'Chưa thanh toán';
                            }
                            ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>




<?php
include_once('views/main/footer.php');
?>