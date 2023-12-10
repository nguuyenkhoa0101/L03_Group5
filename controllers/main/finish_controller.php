<?php
require_once('controllers/main/base_controller.php');

class FinishController extends BaseController
{
	function __construct()
	{
		$this->folder = 'finish';
	}

	public function index()
	{
		$this->render('index');
	}
}