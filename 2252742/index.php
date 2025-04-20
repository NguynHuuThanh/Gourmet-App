<?php 
  // var_dump("whyy");
  session_start();
  ini_set('display_errors', 1);
error_reporting(E_ALL);
  include dirname( __DIR__) . "/2252742/config.php";
  // echo "2";
  require_once __DIR__ . "/app/control/AuthController.php";

  

  $role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
  $page = isset($_GET['page']) ? $_GET['page'] : 'home';

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fdab99180b.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
  </head>
  <body>
    
    <?php
    
    if (in_array($page, ['signin' , 'signup', 'logout'])){
      // die("sossss");
      require_once dirname(__DIR__) . "/2252742/pages/auth.php";
      exit();
    }

    switch($role){
      case 'admin':
        require dirname(__DIR__) . '/2252742/pages/admin.php';
        break;
        case 'user':
          require dirname(__DIR__) . '/2252742/pages/user.php';
          break;
        case 'guest':
          require dirname(__DIR__) . '/2252742/pages/guest.php';
          break;
    }

    // echo "haha";
  ?>

</body>
</html>