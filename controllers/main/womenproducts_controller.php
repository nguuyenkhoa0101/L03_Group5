<?php
require_once('controllers/main/base_controller.php');
require_once('models/womenproduct.php');

class WomenproductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'womenproducts';
	}

	public function index()
	{
		$womenproducts = Womenproduct::getAll();
		$data = array('womenproducts' => $womenproducts);
		$this->render('index', $data);
	}
}
