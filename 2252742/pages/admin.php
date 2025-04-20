<?php 
require_once dirname(__DIR__) . "/app/control/GuestController.php";
require_once dirname(__DIR__) . "/app/control/ProductController.php";
require_once dirname(__DIR__) . "/app/control/UserController.php";


$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'view';
$controller = new GuestController();
$productController = new ProductController();
$userController = new UserController();
?>

<?php
 if ($page === 'home') require dirname(__DIR__) . "/pages/assets/header.php";
 else require dirname(__DIR__) . "/pages/assets/headerUser.php"; 
?>

<?php 
switch ($page){
  case 'home':
    $controller->index('home');
    break;
  case 'posts':
    $controller->index('posts');
    break;
  case 'profile':
    $userController->index('profile');
    break;
  case 'addpost':
    $restaurents = $productController->getRestaurents();
    require_once dirname(__DIR__) . "/app/views/user/addproduct.php";
    break;
  case 'post':
    switch ($action){
      case 'view':
        $post = $productController->view_product();
        require_once dirname(__DIR__) . "/app/views/user/descproduct.php";
        break;
      case 'edit':
        $post = $productController->view_product();
        require_once dirname(__DIR__) . "/app/views/user/editproduct.php";
        break;
      default :
        $productController->view_product();
        break;
    }
    
  default:
    $controller->index('home');
    break;
}
?>

<?php
  require dirname(__DIR__) . "/pages/assets/footer.php";
?>