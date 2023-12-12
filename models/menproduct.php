<?php
require_once('./connection.php');
class Menproduct
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
        $req = $db->query("SELECT * FROM menproduct");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Menproduct(
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
        $req = $db->query("SELECT * FROM menproduct WHERE id = $id");
        $result = $req->fetch_assoc();
        $product = new Menproduct(
            $result['id'],
            $result['name'],
            $result['price'],
            $result['description'],
            $result['content'],
            $result['img'],
            $result['sale'],
            $result['vote_numbers'],
            $result['total_stars']
        );
        return $product;
    }

    static function insert($name, $price, $description, $content, $img, $sale,  $vote_number,$total_stars )
    {
        $vote_number = 0 ; $total_stars = 0 ;
        $db = DB::getInstance();
        $req = $db->query(
            " 
            INSERT INTO menproduct ( name , price , description , content , img , sale, vote_number , total_stars)
            VALUES ('$name', '$price', '$description', '$content', '$img', '$sale' , '$vote_number' , '$total_stars')
            ;");
        return $req;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM menproduct WHERE id = $id");
        return $req;
    }

    static function update($id, $name, $price, $description, $content, $img, $sale)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE menproduct
                SET name = '$name', price = $price, description = '$description', content = '$content', img = '$img' , sale = '$sale'
                WHERE id = $id ; 
            ;");
    }
    static function addvotebyid($id,$star){
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE menproduct
                SET vote_number = vote_number + 1 , total_stars = total_stars + $star 
                WHERE id = $id ; 
            ;");


    }
}
?>