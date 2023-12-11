<?php

include_once('views/main/navbar.php');
$total = 0 ;
?>
<body>
<div class="container">
        <h2 class="mt-4">Giỏ hàng</h2>

        <table class="table mt-3">
            <thead>
                <tr>
                     <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Số lượng</th>
                    <th>Tổng thành tiền</th>
                  
                </tr>
            </thead>
            <tbody>
            <form action="index.php?page=main&controller=cart&action=update" method="POST">
                <?php 
                    if(isset($_SESSION["shopping_cart"])){
                        
                    foreach($_SESSION['shopping_cart'] as $key => $value){ 
                    $temp = $value['product_quantity'] * ($value['product_price'] * (1-$value['product_sale']/100)) ;
                   
                    $total += $temp ; 
                        
                    ?>
                    <tr >
                        <td>
                            <div class="col-sm-3"> <img style="width: 100px ; height:100px ;" src="<?php echo $value['product_image'] ?>" alt=""/> </div>
                        </td>
                        <td>
                        <div class="col_table_name"> 
                            <h4 class="nomargin" style="font-size: 18px;"> <?php echo $value['product_name'] ?> </h4>
                        </div>
                        </td>
                        <td> 
                        <div class="col_table_name"> 
                            <h4 class="nomargin" style="font-size: 18px;"> <?php echo $value['product_price']  ?> VNĐ</h4>
                        </div>
                        </td>
                        <td>
                        <div class="col_table_name"> 
                            <h4 class="nomargin" style="font-size: 18px;"> <?php echo $value['product_sale'] ?>%</h4>
                        </div> 
                        </td>
                        <td>
                        <div class="col_table_name"> 
                            <input type="number" min="1" class="inputsoluong" style="width : 40px; " name="qty[<?php echo $value['product_id'] ?>]" value="<?php echo $value['product_quantity'] ?>" style="font-size: 18px;">  
                        </div>
                        </td>
                        <td>
                        <div class="col_table_name"> 
                            <h4 class="nomargin" style="font-size: 18px;"> <?php echo $value['product_quantity'] * ($value['product_price'] * (1-$value['product_sale']/100))?> </h4>
                        </div>
                        </td>
                       
                        <td class="actions aligncenter">
                        
                        <button type="submit" value=" <?php echo $value['product_id']  ?>" name="delete_cart" class="btn btn-sm btn-danger">
                        Xóa </button>
                        
                        </td>
                      
                       
                    </tr>
                    
                         
                    <?php } }
                    
                    
                ?>
                <div class="col_table_name" style="text-align: right;"> 
                <button type="submit" value=" <?php echo $value['product_id']  ?>" name="update_cart" class="btn btn-sm btn-primary">
                        Update </button>
                </div>
                </form>

            </tbody>
        </table>

    </div>
    
    <div class="col_table_name" style="text-align: right;"> 
        <h4 class="nomargin" style="font-size: 18px;"> Tổng thanh toán: <?php echo $total?> VNĐ </h4>
    </div>
   <?php 
 //   if(!empty($_GET['msg'])){
 //       $msg = unserialize(urldecode($_GET['msg'])) ;
  //      foreach($msg as $key => $value){
 //           echo '<span style="color:blue">'. $value .'<span>';
 //       }
 //   }
    
    ?>
    <div class="container">
        <form action="index.php?page=main&controller=cart&action=order" method="POST" id="myForm">
            <div class="input">
                <?php if(isset($_SESSION["guest"])){  ?>
                    <input type="hidden" value="<?php echo $data->lname ?>" name="order_lname" id="name">
                    <input type="hidden" value="<?php echo $data->phone ?>" name="order_phone">
                    <input type="hidden" value="<?php echo $data->email ?>" name="order_email">
                  <?php  }?>
                <lable> Địa chỉ: </lable>
                <input type="text" name="order_location" required class="clsip">

            </div>
            <div class="col_table_name" style="text-align: left; margin-top: 20px;"> 
                <input type="submit" value=" Gửi đơn hàng" name="update_cart" class="btn btn-sm btn-primary" name="formsubmit" id="formsubmit">
                        
                </div>
                </form>
        </form>

    </div>
   

    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
          
            alert('Đã đặt hàng thành công');
            setTimeout(function() {
                document.getElementById('myForm').submit();
            }, 500);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include_once('views/main/footer.php');
?>