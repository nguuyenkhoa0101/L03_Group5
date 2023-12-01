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
        $req = $db->query("SELECT * FROM menproduct");
        $menproducts = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $menproduct)
        {
            $menproducts[] = new Menproduct(
                $menproduct['id'],
                $menproduct['name'],
                $menproduct['price'],
                $menproduct['description'],
                $menproduct['content'],
                $menproduct['img'],
                $menproduct['sale']
            );
        }
        return $menproducts;
    }

    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM menproduct WHERE id = $id");
        $result = $req->fetch_assoc();
        $menproduct = new Menproduct(
            $result['id'],
            $result['name'],
            $result['price'],
            $result['description'],
            $result['content'],
            $result['img'],
            $result['sale']
        );
        return $menproduct;
    }

    static function insert($name, $price, $description, $content, $img, $sale)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "INSERT INTO menproduct (name, price, description, content, img, sale)
            VALUES ('$name', $price, '$description', '$content', '$img', '$sale');");
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
                WHERE id = $id
            ;");
    }
}
?>