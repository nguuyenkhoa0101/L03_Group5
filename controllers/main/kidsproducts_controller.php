<?php
require_once('controllers/main/base_controller.php');
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
}
