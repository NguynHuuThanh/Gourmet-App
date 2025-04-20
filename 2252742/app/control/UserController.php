<?php 
session_start();
require_once dirname(__DIR__) . "/model/Product.php";
require_once dirname(__DIR__) . "/model/User.php";

class UserController{
  private $model;
  private $user;
  public function __construct(){
    $this->model = new Product();
    $this->user = new User();
  }

  public function index($page){
    switch ($page){
      case 'profile':
        $information = $this->user->getUser($_SESSION['username']);
        // var_dump($information);
        require_once dirname(__DIR__) . "/views/user/profile.php";
      default: 
      break;
    }
  }

}