<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');

class ProductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'products';
	}

	public function index()
	{
		$products = Product::getAll();
		$data = array('products' => $products);
		$this->render('index', $data);
	}
	public function search()
    {
    $search_keyword = $_POST['search_product']; // Lấy giá trị từ ô tìm kiếm trong form
    $search_result = Product::search($search_keyword);
    $data = array('search_result' => $search_result);
    $this->render('search', $data);
    }
}