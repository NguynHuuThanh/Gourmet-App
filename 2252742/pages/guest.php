<?php 
require_once dirname(__DIR__) . "/app/control/GuestController.php";
require_once dirname(__DIR__) . "/app/control/ProductController.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$controller = new GuestController();
// $productcontroller = new ProductController();
?>

<?php 

 if ($page === 'home') require dirname(__DIR__) . "/pages/assets/header.php";
 else require dirname(__DIR__) . "/pages/assets/headerUser.php"; ?>

<?php
switch ($page){
  case 'posts':
    $controller->index('posts');
    break;
  case 'home':
    $controller->index('home');
    break;
  default :
    $controller->index('home');
    break;
}

?>

<?php if ($page !== 'signin' && $page !== 'signup') require dirname(__DIR__) . "/pages/assets/footer.php"; ?>
