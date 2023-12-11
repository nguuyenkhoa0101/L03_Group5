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
	public function vote(){
		session_start() ;
		$id= $_POST['product_id'] ;
		$star= $_POST['starRating'] ;
		Product::addvotebyid($id,$star) ;

		header('Location: index.php?page=main&controller=cart&action=index');
	
	}
}
