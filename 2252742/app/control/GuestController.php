<?php 
// session_start();
require_once dirname(__DIR__) . "/model/Product.php";

class GuestController{
  private $products;
  // private $restaurents;

  public function __construct(){
    $this->products = new Product();
  }

  public function index($page){
    switch ($page){
      case 'home':
        require_once dirname(__DIR__) . "/views/home.php";
        break;
      case 'posts':
        // require_once dirname(__DIR__) . "/views/viewproducts.php";
        $this->viewPosts();
        break;
      default :
      require_once dirname(__DIR__) . "/views/home.php";
      break;
    }
  }

  private function viewPosts(){
    require_once dirname(__DIR__) . "/views/viewproducts.php";
  }

}