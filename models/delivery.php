<?php
require_once('./connection.php');
class Delivery
{
    public $id;
    public $hoTen;
    public $soDienThoai;
    public $email;
    public $tinhThanh;
    public $quanHuyen;
    public $phuongXa;
    public $diaChi;
    public $ngayDatHang;
    public $tongTienHang;

    public function __construct($id, $hoTen, $soDienThoai, $email, $tinhThanh, $quanHuyen, $phuongXa, $diaChi, $ngayDatHang, $tongTienHang)
    {
        $this->id = $id;
        $this->hoTen = $hoTen;
        $this->soDienThoai = $soDienThoai;
        $this->email = $email;
        $this->tinhThanh = $tinhThanh;
        $this->quanHuyen = $quanHuyen;
        $this->phuongXa = $phuongXa;
        $this->diaChi = $diaChi;
        $this->ngayDatHang = $ngayDatHang;
        $this->tongTienHang = $tongTienHang;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM delivery ORDER BY ngayDatHang DESC");
        $deliveries = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $delivery)
        {
            $deliveries[] = new Delivery(
                $delivery['id'],
                $delivery['hoTen'],
                $delivery['soDienThoai'],
                $delivery['email'],
                $delivery['tinhThanh'],
                $delivery['quanHuyen'],
                $delivery['phuongXa'],
                $delivery['diaChi'],
                $delivery['ngayDatHang'],
                $delivery['tongTienHang']
            );
        }
        return $deliveries;
    }

    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM delivery WHERE id = $id");
        $result = $req->fetch_assoc();
        $delivery = new Delivery(
            $result['id'],
            $result['hoTen'],
            $result['soDienThoai'],
            $result['email'],
            $result['tinhThanh'],
            $result['quanHuyen'],
            $result['phuongXa'],
            $result['diaChi'],
            $result['ngayDatHang'],
            $result['tongTienHang']
        );
        return $delivery;
    }

    static function insert($hoTen, $soDienThoai, $email, $tinhThanh, $quanHuyen, $phuongXa, $diaChi, $ngayDatHang, $tongTienHang)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
            INSERT INTO delivery (hoTen, soDienThoai, email, tinhThanh, quanHuyen, phuongXa, diaChi, ngayDatHang, tongTienHang)
            VALUES ('$hoTen', '$soDienThoai', '$email', '$tinhThanh', '$quanHuyen', '$phuongXa', '$diaChi', '$ngayDatHang', '$tongTienHang')
            ;");
        return $req;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM delivery WHERE id = $id;");
        return $req;
    }

    static function update($id, $hoTen, $soDienThoai, $email, $tinhThanh, $quanHuyen, $phuongXa, $diaChi, $ngayDatHang, $tongTienHang)
    {
        $db = DB::getInstance();
        $req = $db->query("UPDATE delivery SET hoTen = '$hoTen', soDienThoai = '$soDienThoai', email = '$email', tinhThanh = '$tinhThanh', quanHuyen = '$quanHuyen', phuongXa = '$phuongXa', diaChi = '$diaChi', ngayDatHang = '$ngayDatHang', tongTienHang = '$tongTienHang' WHERE id = $id;");
        return $req;
    }
}
?>