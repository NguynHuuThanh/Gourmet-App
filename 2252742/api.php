<?php 
  require_once __DIR__ . "/config.php";
  require_once __DIR__ . "/app/control/AuthController.php";
  require_once __DIR__ . "/app/control/ProductController.php";
  require_once __DIR__ . "/app/control/GuestController.php";
  require_once __DIR__ . "/app/control/AdminController.php";
  require_once __DIR__ . "/app/control/UserController.php";

  $page = isset($_GET['page']) ? $_GET['page'] : 'home';
  $role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';

  switch ($page){
    case 'auth' :
      $controller = new AuthController();

      $action = $_GET['action'];
      switch ($action) {
        case 'validate' :
          $controller->validate();
          break;
        case 'signup':
          $controller->register();
          break;
        case 'logout':
          $controller->logout();
        default:
          break;
      }
    case 'posts':
      $controller = new ProductController();
      $controller->get();
      break;

    case 'post':
      $action = $_GET['action'];
      switch ($action){
        case 'edit':
          $controller = new ProductController();
          $controller->edit_product();
          break;
        case 'delete':
          $controller = new ProductController();
          $controller->delete_product();
          header("Location: " . BASE_URL);
          break;
        // case 'add':
        //   $controller = new ProductController();
        //   $controller->add_product();
        //   break;
        default: 
          break;
      }
    case 'profile':
      $action = $_GET['action'];
      switch ($action){
        case 'addpost':
          $controller = new ProductController();
          $controller->add_product();
          break;
      }
    
    default:
      break;
  }
?>