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
}
