<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once dirname(__DIR__) . "/app/control/AuthController.php";

$controller = new AuthController();
$controller->auth_handle($page);

// require_once dirname(__DIR__) . "/pages/assets/footer.php";