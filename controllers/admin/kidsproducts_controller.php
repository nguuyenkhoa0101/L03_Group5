<?php
require_once('controllers/admin/base_controller.php');
require_once('models/kidsproduct.php');


class KidsproductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'kidsproducts';
	}

	public function index()
	{
        $kidsproducts = Kidsproduct::getAll();
        $data = array('kidsproducts' => $kidsproducts);
        $this->render('index', $data);
	}
    public function add(){
        $id = (string)date("Y_m_d_h_i_sa");
        $fileuploadname = (string)$id;
        $name = $_POST['name'];
        $sale = $_POST['sale'];
        $price= $_POST['price'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $target_dir = "assets/images/kidsproduct/";
        $path = $_FILES['fileToUpload']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $fileuploadname .= ".";
        $fileuploadname .= $ext;
        $target_file = $target_dir . basename($fileuploadname);
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        }
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Allow certain file formats
        if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
        && $fileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        Kidsproduct::insert($name, $price, $description, $content, $target_file, $sale);
        header('Location: index.php?page=admin&controller=kidsproducts&action=index');
    }
    public function edit(){
        $id = $_POST['id'];
        $code = (string)date("Y_m_d_h_i_sa");
        $fileuploadname = (string)$code;
        $name = $_POST['name'];
        $sale = $_POST['sale'];
        $price= $_POST['price'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $urlcurrent = Kidsproduct::get((int)$id)->img;
        if (!isset($_FILES["fileToUpload"]) || $_FILES['fileToUpload']['tmp_name'][0] == "")
        {
            Kidsproduct::update($id, $name, $price, $description, $content, $urlcurrent, $sale);
            echo "Dữ liệu upload bị lỗi";
            header('Location: index.php?page=admin&controller=kidsproducts&action=index');
            die;
        }
        else{
            $target_dir = "assets/images/kidsproduct/";
            $path = $_FILES['fileToUpload']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $fileuploadname .= ".";
            $fileuploadname .= $ext;
            $target_file = $target_dir . basename($fileuploadname);
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            }
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Allow certain file formats
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
            && $fileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $upload_ok = 0;
            }
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            }
            $file_pointer = $urlcurrent;
            unlink($file_pointer);
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            Kidsproduct::update($id, $name, $price, $description, $content, $target_file, $sale);
            header('Location: index.php?page=admin&controller=kidsproducts&action=index');
        }
    }
    public function delete(){
        $id = $_POST['id'];
        $urlcurrent = Kidsproduct::get((int)$id)->img;
        unlink($urlcurrent);
        Kidsproduct::delete($id);
        header('Location: index.php?page=admin&controller=kidsproducts&action=index');
    }
}
