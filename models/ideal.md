Đánh giá sản phẩm: 
_ Ở bảng product: thêm vào thuộc tính là vote_number kiểu int để lưu số lượng đã vote và total_stars kiểu int để lưu tổng sao đã vote cho các stars đã vote. Các thông số này ở các hàm add hay đổ dữ liệu từ sql đều có giá trị mặc định là 0.
_ Ở view/main detail, thêm 1 form có 1 thẻ input 1 đến 5 sao trong đó. action="index.php?page=main&controller=product&action=vote" với method = "POST". Thẻ form cần đc gửi các input: id sản phẩm (type="hidden" name="id"), input 12345 sao ( type ="radio" name="star"). 
_ Ở controller/main product_controller: cần code thêm phương thức addvote(): nhận các _$POST['id'], _$POST['star'] rồi gán vào $id và $star. Rồi sử dụng hàm addvotebyid($id,$star) có trong model Product.
_ Ở model Product: thêm hàm addvotebyid($id,$star): thực hiện update các trường cho các sản phẩm trong product có id = $id: vote_number +=1 ; total_stars += $star.
Và ở trong đối tượng Product, thêm 2 biến nữa là $vote_number và $total_stars theo như bảng product nói trên. 
_ Quay lại view, sau khi có thêm được $vote_number và $total_stars thì xuất ra giá trị $total_stars/$vote_number ở dưới các sản phẩm.