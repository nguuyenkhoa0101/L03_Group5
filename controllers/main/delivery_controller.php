<?php
require_once('controllers/main/base_controller.php');
require_once('models/delivery.php');

class DeliveryController extends BaseController
{
    function __construct()
    {
        $this->folder = 'delivery';
   
    }
    public function index()
    {
        $this->render('index');
    }

    public function add()
    {
        $hoTen = $_POST['name'];
        $soDienThoai = $_POST['phone-number'];
        $email = $_POST['email'];
        $tinhThanh = $_POST['province'];
        $quanHuyen = $_POST['district'];
        $phuongXa = $_POST['ward'];
        $diaChi = $_POST['address-detail'];
        $ngayDatHang = date('Y-m-d');
        $tongTienHang = 0; 
        Delivery::insert($hoTen, $soDienThoai, $email, $tinhThanh, $quanHuyen, $phuongXa, $diaChi, $ngayDatHang, $tongTienHang);
        header('Location: index.php?page=main&controller=finish&action=index');
    }
}