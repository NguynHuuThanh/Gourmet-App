<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// session_start();
require_once dirname(__DIR__) . "/model/User.php";
class AuthController{
  private $model;
  public function __construct(){
    $this->model = new User();
  }

  public function auth_handle($action){
    switch ($action){
      case 'signin' :
        $this->signin();
        break;
      case 'signup':
        $this->register_form();
        break;
      default: 
        break;
    }
  }
  
  private function signin() {
    require_once dirname(__DIR__) . "/views/auth/login.php";
  }

  private function register_form(){
    require_once dirname(__DIR__) . "/views/auth/register.php";
  }

  public function logout(){
    setcookie("user", session_id(), time() - 3600, '/');
    // session_reset();
    // session_start();
    session_reset();
    session_destroy();
    header("Location: " . BASE_URL);
    exit();
  }
  public function validate() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = json_decode(file_get_contents('php://input'), true); // <== `true` is second param, not first

      $username = trim($data['username']);
      $password = trim($data['password']);

      $res = [];

      $user = $this->model->getUser($username);

      if (!empty($user) && password_verify($password, $user[0]['password_hash'])){
        $_SESSION['userid'] = $user[0]['id'];
        $_SESSION['username'] = $user[0]['username'];
        $_SESSION['fullname'] = $user[0]['family_name'] . " " . $user[0]['last_name'];
        $_SESSION['dob'] = $user[0]['dob'];
        $_SESSION['email'] = $user[0]['email'];
        $_SESSION['num_post'] = $user[0]['num_post'];
        $_SESSION['created_at'] = $user[0]['created_at'];
        $_SESSION['role'] = $user[0]['level'];
        setcookie("user", $user[0]['username'], time() + 24 * 60 * 60, '/');
        $res = ['status' => 'success']; 
      } else {
          $res = [
            'status' => 'fail',
            'msg' => "Incorrect username or password!"
          ];
      }
      
      header("Content-Type: application/json");
      echo json_encode($res);
      exit();
    }
  }

  public function register() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = json_decode(file_get_contents('php://input'), true);
      $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
      $user = $this->model->addUser($data);

      $res = [];

      if (isset($user['username_exists'])) {
        $res['status'] = 'fail';
        if ($user['username_exists'] == True) $res['username_exists'] = 1;
        else $res['username'] = 0;

        if ($user['email_exists'] == True) $res['email_exists'] = 1;
        else $res['email_exists'] = 0;
      }
      else {
        $res['status'] = 'success';
      }
      header("Content-Type: application/json");
      echo json_encode($res);
      exit();
    }
  }
}