<?php
require_once('controllers/main/base_controller.php');
require_once('models/order.php');

class CartController extends BaseController
{
	function __construct()
	{ 
	    $data = array() ;
        $this->folder = 'cart';
    }
	public function index()
	{
	
		session_start() ;
		$this->render('index');
	}
	public function submit()
	{
		session_start() ;
		if(!isset($_SESSION["guest"])){
			header('Location: index.php?page=main&controller=login&action=index');
		}
		else{
		if(isset($_SESSION["shopping_cart"])){
			$available = 0 ;
			foreach($_SESSION["shopping_cart"] as $key => $value){
				if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id'] ){
					$available ++ ;
					$_SESSION["shopping_cart"][$key]['product_quantity'] += $_POST['product_quantity'] ;

				}
				

			}
			if($available == 0) {
				$item = array(
					'product_id' => $_POST["product_id"],
					'product_name' => $_POST["product_name"],
					'product_image' => $_POST["product_image"],
					'product_price' => $_POST["product_price"],
					'product_sale' => $_POST["product_sale"],
					'product_quantity' => $_POST["product_quantity"]
				);
				$_SESSION["shopping_cart"][] = $item ;

			}

		}
		else{
			$item = array(
				'product_id' => $_POST["product_id"],
				'product_name' => $_POST["product_name"],
				'product_image' => $_POST["product_image"],
				'product_price' => $_POST["product_price"],
				'product_sale' => $_POST["product_sale"],
				'product_quantity' => $_POST["product_quantity"]
			);
			$_SESSION["shopping_cart"][] = $item ;

		}
		header('Location: index.php?page=main&controller=cart&action=index');
		}
	}

	public function update(){
	
		session_start() ;

		if(isset($_POST["delete_cart"])){
		if(isset($_SESSION["shopping_cart"])){
			foreach($_SESSION["shopping_cart"] as $key => $values){
				if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['delete_cart'] ){
					unset($_SESSION["shopping_cart"][$key]) ; 

				}
			}
			header('Location: index.php?page=main&controller=cart&action=index');
			

		}
		else{
			header('Location: index.php?page=main&controller=menproducts&action=index');

		}
	}
		else {
			foreach($_POST['qty'] as $key => $qty){
				foreach($_SESSION["shopping_cart"] as $session => $values){
					if($values['product_id']==$key  ){
						$_SESSION["shopping_cart"][$session]['product_quantity'] =  $qty ;

					}
				}
		
			}
			header('Location: index.php?page=main&controller=cart&action=index');
    	}
    }
	public function order()
	{
		session_start() ;
		//$table_order_details = "order_details" ;
		//$ordermodel= Order::getAll();
		$name= $_POST['order_lname'] ;
		$phone= $_POST['order_phone'] ;
		$email= $_POST['order_email'] ;
		$location= $_POST['order_location'] ;
		$order_code = rand(0,99999999);

		date_default_timezone_set('asia/ho_chi_minh') ;
		$date = date("d/m/Y") ;
		$hour = date("h:i:sa") ;
		$order_date = $date .' '. $hour ;
		$order_status = 0 ;
		echo $order_code ;
		echo $order_date ;
		echo $order_status ;
		$result_order = Order::insert($order_code,$order_date,$order_status); 
		
		

		if(isset($_SESSION["shopping_cart"])){
		
			 foreach($_SESSION["shopping_cart"] as $key => $value){
				
					
					$product_id = $value['product_id'] ;
					$product_quantity = $value['product_quantity'] ;
					
					
					$result_order_details = Order::insert_details($order_code,$product_id,$product_quantity,$name,$phone,$email,$location); 

			 }
			 unset($_SESSION["shopping_cart"]);

		}
		if($result_order_details){
			//$message['msg'] = "Đặt hàng thành công" ;
			header('Location: index.php?page=main&controller=cart&action=index');

		}
	





	}



}
