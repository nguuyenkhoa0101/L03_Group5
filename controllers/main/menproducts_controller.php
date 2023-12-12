<?php
require_once('controllers/main/base_controller.php');
require_once('models/menproduct.php');

class MenproductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'menproducts';
	}

	public function index()
	{
		$menproducts = Menproduct::getAll();
		$data = array('menproducts' => $menproducts);
		$this->render('index', $data);
	}
	public function search()
    {
    $search_keyword = $_POST['search_product']; // Lấy giá trị từ ô tìm kiếm trong form
    $search_result = Product::search($search_keyword);
    $data = array('search_result' => $search_result);
    $this->render('search', $data);
    }
	public function vote(){
		session_start() ;
		$id= $_POST['product_id'] ;
		$star= $_POST['starRating'] ;
		Menproduct::addvotebyid($id,$star) ;

		header('Location: index.php?page=main&controller=menproducts&action=index');
	
	}
}
