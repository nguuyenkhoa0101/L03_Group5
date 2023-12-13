<?php
$pages = array(
  'error' => ['errors'],
  'main' => ['layouts', 'about', 'blog', 'archive', 'contact', 'login', 'register', 'detail', 'sale', 'detail_blog','cart'],
  'admin' => ['layouts', 'members', 'products','menproducts','womenproducts','shoesproducts','news', 'comments','order','order_details']
);
$controllers = array(

  'errors' => ['index'],
  'layouts' => ['index'], 
  'members' => ['index'],
  'products' => ['index','add','edit','delete','vote'],
  'menproducts' => ['index','add','edit','delete','vote'],
  'womenproducts' => ['index','add','edit','delete','vote'],
  'shoesproducts' => ['index','add','edit','delete','vote'],
  'news' => ['index','add','edit','delete','hide'],
  'comments' => ['index','hide','add','edit','delete'],
  'admin' => ['index', 'add', 'edit', 'delete'],
  'user' => ['index', 'add', 'editInfo', 'editPass', 'delete'],
  'company' => ['index', 'add', 'edit', 'delete'],
  'login' => ['index', 'check', 'logout'],
  'order' => ['index','order'] ,
  'order_details' => ['index','order_details','confirm'] ,
  'about' => ['index'],
  'sale' => ['index'],
  'detail' => ['index','vote'],
  'blog' => ['index'],
  'archive' => ['index'],
  'contact' => ['index'],
  'detail_blog' => ['index', 'comment', 'reply'],
  'blog' => ['index', 'comment', 'reply'],
  'register' => ['index', 'submit', 'editInfo'],
  'cart' => ['index','submit','update','order'],
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($page, $pages) || !array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $page = 'error';
  $controller = 'errors';
  $action = 'index';
}
if($page=='error'){
  $controller = 'errors';
  $action = 'index';
}

// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('controllers/' .$page ."/" . $controller . '_controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
