<?php
require_once('./connection.php');
class Order
{
    public $order_id;
    public $order_code;
    public $order_date;
    public $order_status;

    public function __construct($order_id, $order_code, $order_date, $order_status)
    {
        $this->$order_id = $order_id;
        $this->$order_code =  $order_code;
        $this->$order_date = $order_date;
        $this->$order_status = $order_status;
      
    }
    // static function getAll()
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("SELECT * FROM orders");
    //     $orders = [];
    //     foreach ($req->fetch_all(MYSQLI_ASSOC) as $order)
    //     {
    //         $orders[] = new Order(
    //             $order['id'],
    //             $order['name'],
    //             $order['price'],
    //             $order['description'],
    //             $order['content'],
    //             $order['img'],
    //             $order['sale']
    //         );
    //     }
    //     return $orders;
    // }


   

    static function insert($order_code,$order_date,$order_status)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "   
            INSERT INTO orders (order_code,order_date,order_status)
            VALUES ('$order_code',  '$order_date' , '$order_status')
            ;");
        return $req;
    }
    static function insert_details($order_code,$product_id,$product_quantity,$name,$phone,$email,$location){
        $db = DB::getInstance();
        $req = $db->query(
            "   
            INSERT INTO order_details (order_code,product_id,product_quantity,name,phone,email,location)
            VALUES ('$order_code',  '$product_id' , '$product_quantity' , '$name' , '$phone' , '$email', '$location')
            ;");
        return $req;
    }

    // static function delete($id)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query("DELETE FROM product WHERE id = $id");
    //     return $req;
    // }

    // static function update($id, $name, $price, $description, $content, $img, $sale)
    // {
    //     $db = DB::getInstance();
    //     $req = $db->query(
    //         "
    //             UPDATE product
    //             SET name = '$name', price = $price, description = '$description', content = '$content', img = '$img' , sale = '$sale'
    //             WHERE id = $id
    //         ;");
    // }
    static function list_order()
    {
        $db = DB::getInstance();
        $req = $db->query(
            " SELECT * FROM  orders ORDER BY order_id DESC " );
        return $req;
    }
    static function list_order_details($order_code) {
        $db = DB::getInstance();
        $query = "SELECT * FROM order_details, menproduct WHERE menproduct.id = order_details.product_id AND order_details.order_code = $order_code";
        $req = $db->query($query);
        return $req;



    }
    static function list_order_infos($order_code) {
        $db = DB::getInstance();
        $query = "SELECT * FROM order_details WHERE order_details.order_code = $order_code LIMIT 1";
        $req = $db->query($query);
        return $req;

    }
    static function confirm_status($order_code) {
        $db = DB::getInstance();
        $query = "UPDATE orders
        SET order_status = 1
        WHERE order_code = $order_code;";
        $req = $db->query($query);
        return $req;



    }
}
?>