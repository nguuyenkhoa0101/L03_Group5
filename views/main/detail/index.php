<?php
  include_once('views/main/navbar.php');
  $id = $_GET['id'];
?>
<div class="container py-2 ">
    <?php         
        foreach ($products as $product) {
            if ($id == $product->id){
                ?>
    <div class="row" style="height: 100px">
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="row mt-2">
                <div class="card h-100">
                    <?php
                    if ($product->sale !=0)
                    echo '<div class="badge bg-warning text-dark position-absolute" style="top: 0.5rem; right: 0.5rem">SALE '
                        . $product->sale . '%</div>'
                ?>
                    <img src="<?php echo $product->img;?>" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="<?php echo $product->img;?>" class="img-thumbnail mt-2" alt="">
                </div>
                <div class="col">
                    <img src="<?php echo $product->img;?>" class="img-thumbnail mt-2" alt="">
                </div>
                <div class="col">
                    <img src="<?php echo $product->img;?>" class="img-thumbnail mt-2" alt="">
                </div>
                <div class="col">
                    <img src="<?php echo $product->img;?>" class="img-thumbnail mt-2" alt="">
                </div>
            </div>
        </div>


        <div class="col-md-12 col-lg-8 col-xl-8 mt-4">
            <div class="text-center">
                <h5 class="fw-bolder"><?php echo $product->name; ?></h5>

                <span class="red"><?php echo  number_format($product->price*(100-$product->sale)/100, 0, '', '.');?>
                    VNĐ</span></span> <span class="money-unit"></span>
                <span
                    class="text-muted text-decoration-line-through"><?php echo number_format($product->price, 0, ',', '.');?>VNĐ</span>
            </div>

            <div class="text-left">
                <ul>
                    <li class="mt-2 fw-bold">Tình trạng: <span class="text-danger fw-bold">Còn hàng</span></li>
                    <li class="mt-2 fw-bold">Ưu đãi:</li>
                    <ul>
                        <li class="mt-2 text-primary fw-bold ">MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG TỪ 500.000Đ</li>
                        <li class="mt-2 text-warning fw-bold">ĐỔI TRẢ MIỄN PHÍ TRONG VÒNG 7 NGÀY</li>
                        <li class="mt-2 text-info fw-bold">CAM KẾT 100% CHÍNH HÃNG</li>
                    </ul>
                    <li class="mt-2 fw-bold">Mô tả:</li>
                    <ul>
                        <li class="mt-2"><?php echo $product->description; ?></li>
                        <li class="mt-2">
                            <?php echo str_replace(array("\r\n","\n\n","\n\r","\r\r", "\n", "\r"),'<br><br>',$product->content); ?>
                        </li>
                    </ul>
                </ul>
            </div>
         
                <form action="index.php?page=main&controller=cart&action=submit" method="POST">
                <input type="hidden" value="<?php echo $product->id ?>" name="product_id">
                <input type="hidden" value="<?php echo $product->name ?>" name="product_name">
                <input type="hidden" value="<?php echo $product->img ?>" name="product_image">
                <input type="hidden" value="<?php echo $product->price ?>" name="product_price">
                <input type="hidden" value="<?php echo $product->sale ?>" name="product_sale">
                <input type="hidden" value="<?php echo 1 ?>" name="product_quantity">
               

            <div class="mt-2 text-center mb-2 ">
                <input id="addToCartBtn" class="btn btn-outline-warning" type="submit" name="addcart" value="Thêm vào giỏ hàng">
            </div>
            </form>
           
           
        </div>
        <?php
            }
            ?>
        <?php
        }
    ?>
        <div class="row" style="height: 100px">
        </div>
        <div class="row">
            <h2 class="text-center fw-bold">SẢN PHẨM KHÁC</h2>
            <?php 
        $max = 0;
        foreach($products as $product){
            $max += 1;
        }
        $arr = array();
        for($s = 0; $s < 4; $s++){
            $temp = rand(1, $max);
            while(in_array($temp, $arr)){
                $temp = rand(1, $max);;
            }
            array_push($arr,$temp);
        }
        $count= 0;
        foreach ($products as $product) {
            $count += 1;
            foreach($arr as $i){
            if ($id != $product->id && $i == $count){
                echo '
                        <div class="col-12 col-lg-3 col-md-6 mb-3 mt-3">
                        <div class="card h-100">';
                        if ($product->sale) 
                          echo  '<div class="badge bg-warning text-dark position-absolute" style="top: 0.5rem; right: 0.5rem">SALE '. $product->sale .'%</div>';
                              echo'  <!-- Product image-->
                    <img class="card-img-top" src="' . $product->img .'" alt="...">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="product-name fw-bolder">' .$product->name . '</h5>
                            <!-- Product price-->
                            <span class="red">' . number_format($product->price*(100-$product->sale)/100, 0, ',', '.') .
                                ' VNĐ</span></span> <span class="money-unit"></span>
                            <br>
                            <span class="text-muted text-decoration-line-through">' . number_format($product->price, 0,
                                ',', '.') . ' VNĐ</span>
                        </div>
                        <!-- Rating -->
                        <div class="star-block">
                        </div>

                    </div>

                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                href="index.php?page=main&controller=detail&id='. $product->id .'&action=index">Xem
                                thêm</a></div>
                    </div>
                </div>
            </div>';
            }
            }
            }
            ?>
        </div>


    </div>
</div>
<section class="carttab">
    <div class="cart-tab">
        <div class="cart-tab-top">
            <h1>Giỏ hàng</h1>
            <button class="close">
                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <style>
                        .cls-1 {
                            fill: none;
                            stroke: #fff;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-width: 2px;
                        }
                        </style>
                    </defs>
                    <title />
                    <g id="cross">
                        <line class="cls-1" x1="7" x2="25" y1="7" y2="25" />
                        <line class="cls-1" x1="7" x2="25" y1="25" y2="7" />
                    </g>
                </svg>
            </button>
        </div>

        <div class="list-cart">
            <div class="item">
                <div class="image">
                    <img src="./images/Nu_aocroptop.jpg" alt="">
                </div>
                <div class="item-name">
                    Áo crop-top
                </div>

                <div class="price">
                    1.000.000đ
                </div>

                <div class="quantity">
                    <span class="minus">-</span>
                    <span>1</span>
                    <span class="plus">+</span>
                </div>
            </div>

            <div class="item">
                <div class="image">
                    <img src="./images/Nu_aoBochun.jpg" alt="">
                </div>
                <div class="item-name">
                    Áo lụa tay bo chun </div>

                <div class="price">
                    1.000.000đ
                </div>

                <div class="quantity">
                    <span class="minus">-</span>
                    <span>1</span>
                    <span class="plus">+</span>
                </div>
            </div>

            <div class="item">
                <div class="image">
                    <img src="./images/Nu_aocongso.jpg" alt="">
                </div>
                <div class="item-name">
                    Áo công sở
                </div>

                <div class="price">
                    1.000.000đ
                </div>

                <div class="quantity">
                    <span class="minus">-</span>
                    <span>1</span>
                    <span class="plus">+</span>
                </div>
            </div>

            <div class="item">
                <div class="image">
                    <img src="./images/Nu_aohaiday.jpg" alt="">
                </div>
                <div class="item-name">
                    Áo hai dây
                </div>

                <div class="price">
                    1.000.000đ
                </div>

                <div class="quantity">
                    <span class="minus">-</span>
                    <span>1</span>
                    <span class="plus">+</span>
                </div>
            </div>

        </div>

        <div class="btn">
            <a class="check-out" href="cart.html"> Xem giỏ hàng</a>
        </div>

    </div>
</section>
<script>
// JavaScript để xử lý sự kiện click
document.getElementById('addToCartBtn').addEventListener('click', function() {
    // Lấy số lượng hiện tại từ logo giỏ hàng
    var currentCount = parseInt(document.getElementById('cartCount').innerText);

    // Cộng thêm 1
    var newCount = currentCount + 1;

    // Hiển thị số lượng mới lên trên logo giỏ hàng
    document.getElementById('cartCount').innerText = newCount;
});
</script>

<!-- Cart tab -->

<script>
const icon_cart = document.querySelector('#cart');
const cart_tab = document.querySelector('.cart-tab');
const close_btn = document.querySelector('.close');

icon_cart.addEventListener('click', () => {
    cart_tab.classList.add('active')
})

close_btn.addEventListener('click', () => {
    cart_tab.classList.remove('active')
})
</script>

<?php
   include_once('views/main/footer.php');
?>