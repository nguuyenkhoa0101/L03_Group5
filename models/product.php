<?php
require_once('./connection.php');
class Product
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $content;
    public $img;
    public $sale;
    public $vote_number;
    public $total_stars;


    public function __construct($id, $name, $price, $description, $content, $img, $sale, $vote_number, $total_stars )
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->content = $content;
        $this->img = $img;
        $this->sale= $sale;
        $this->vote_number = $vote_number;
        $this->total_stars = $total_stars;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars']
            );
        }
        return $products;
    }

    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE id = $id");
        $result = $req->fetch_assoc();
        $product = new Product(
            $result['id'],
            $result['name'],
            $result['price'],
            $result['description'],
            $result['content'],
            $result['img'],
            $result['sale'],
            $result['vote_number'],
            $result['total_stars']
        );
        return $product;
    }

    static function insert($name, $price, $description, $content, $img, $sale)
    {
        $db = DB::getInstance();
        $req = $db->query(
            " 
            INSERT INTO product ( name , price , description , content , img , sale)
            VALUES ('$name', '$price', '$description', '$content', '$img', '$sale')
            ;");
        return $req;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM product WHERE id = $id");
        return $req;
    }

    static function update($id, $name, $price, $description, $content, $img, $sale)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE product
                SET name = '$name', price = $price, description = '$description', content = '$content', img = '$img' , sale = '$sale'
                WHERE id = $id ; 
            ;");
    }
    static function addvotebyid($id,$star){
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE product
                SET vote_number = vote_number + 1 , total_stars = total_stars + $star 
                WHERE id = $id ; 
            ;");


    }
}
?>