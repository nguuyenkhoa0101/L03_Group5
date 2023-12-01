<?php
require_once('./connection.php');
class Womenproduct
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $content;
    public $img;
    public $sale;

    public function __construct($id, $name, $price, $description, $content, $img, $sale)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->content = $content;
        $this->img = $img;
        $this->sale= $sale;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM womenproduct");
        $womenproducts = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $womenproduct)
        {
            $womenproducts[] = new Womenproduct(
                $womenproduct['id'],
                $womenproduct['name'],
                $womenproduct['price'],
                $womenproduct['description'],
                $womenproduct['content'],
                $womenproduct['img'],
                $womenproduct['sale']
            );
        }
        return $womenproducts;
    }

    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM womenproduct WHERE id = $id");
        $result = $req->fetch_assoc();
        $womenproduct = new Womenproduct(
            $result['id'],
            $result['name'],
            $result['price'],
            $result['description'],
            $result['content'],
            $result['img'],
            $result['sale']
        );
        return $womenproduct;
    }

    static function insert($name, $price, $description, $content, $img, $sale)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "INSERT INTO womenproduct (name, price, description, content, img, sale)
            VALUES ('$name', $price, '$description', '$content', '$img', '$sale');");
        return $req;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM womenproduct WHERE id = $id");
        return $req;
    }

    static function update($id, $name, $price, $description, $content, $img, $sale)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE womenproduct
                SET name = '$name', price = $price, description = '$description', content = '$content', img = '$img' , sale = '$sale'
                WHERE id = $id
            ;");
    }
}
?>