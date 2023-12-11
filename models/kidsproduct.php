<?php
require_once('./connection.php');
class Kidsproduct
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
        $req = $db->query("SELECT * FROM kidsproduct");
        $kidsproducts = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $kidsproduct)
        {
            $kidsproducts[] = new Kidsproduct(
                $kidsproduct['id'],
                $kidsproduct['name'],
                $kidsproduct['price'],
                $kidsproduct['description'],
                $kidsproduct['content'],
                $kidsproduct['img'],
                $kidsproduct['sale']
            );
        }
        return $kidsproducts;
    }

    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM kidsproduct WHERE id = $id");
        $result = $req->fetch_assoc();
        $kidsproduct = new Kidsproduct(
            $result['id'],
            $result['name'],
            $result['price'],
            $result['description'],
            $result['content'],
            $result['img'],
            $result['sale']
        );
        return $kidsproduct;
    }

    static function insert($name, $price, $description, $content, $img, $sale)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "INSERT INTO kidsproduct (name, price, description, content, img, sale)
            VALUES ('$name', $price, '$description', '$content', '$img', '$sale');");
        return $req;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM kidsproduct WHERE id = $id");
        return $req;
    }

    static function update($id, $name, $price, $description, $content, $img, $sale)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE kidsproduct
                SET name = '$name', price = $price, description = '$description', content = '$content', img = '$img' , sale = '$sale'
                WHERE id = $id
            ;");
    }
}
?>