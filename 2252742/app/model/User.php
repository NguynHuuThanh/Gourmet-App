<?php
require_once dirname(__DIR__) . "/../database.php";

class User{
  private $database;

  public function __construct(){
    $this->database = Database::get_instance();
  }

  public function getUser($username){
    $sql = "SELECT * FROM Reviewer WHERE username = ?";
    $stmt = $this->database->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function validateLogin($data) {
    try {
      $sql = "SELECT * FROM Reviewer WHERE username = ? AND password_hash = ?";
      $stmt = $this->database->prepare($sql);
      $stmt->bind_param("ss", $data['username'], $data['password']);
      $stmt->execute();
      $stmt->get_result();

      $result = ['status' => 'success'];
      if ($stmt->num_rows === 0){
        $result['validate'] = 'fail';
      } else {
        $result['validate'] = 'success';
      }
      return $result;
    } catch (Exception $e){
      return ['status' => 'fail' , 'error' => $e->getMessage()];
    }
  }

  public function validateRegister($data){
    try {
      $sql = "SELECT username, email FROM Reviewer WHERE username = ? OR email = ?";
      $stmt = $this->database->prepare($sql);
      $stmt->bind_param("ss", $data['username'], $data['email']);
      $stmt->execute();
  
      $stmt->store_result();
      
      $result = ['status' => 'duplicate'];
  
      if ($stmt->num_rows > 0) {
        $existing_username = '';
        $existing_email = '';
          $stmt->bind_result($existing_username, $existing_email);
          while ($stmt->fetch()) {
              if ($existing_username === $data['username']) {
                  $result['username'] = 1;
              }
              if ($existing_email === $data['email']) {
                  $result['email'] = 1;
              }
          }
      }
      return $result;
    } catch (Exception $e){
      return ['status' => 'fail', 'error' => $e->getMessage()];
    }
  }

  public function addUser($data){

    try {
      $validationResult = $this->validateRegister($data);

      if (isset($validationResult['username']) || isset($validationResult['email'])) {
        return [
          'status' => 'fail',
          'message' => 'Validation failed',
          'username_exists' => isset($validationResult['username']),
          'email_exists' => isset($validationResult['email'])
        ];
      }

      $sql = "INSERT INTO Reviewer (family_name, last_name, dob, username, password_hash, email)
      VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $this->database->prepare($sql);

      $stmt->bind_param("ssssss", $data['family_name'], $data['last_name'], $data['dob'], $data['username'], $data['password_hash'] , $data['email']);
      $stmt->execute();
      return ['status' => 'success'];
    } catch (Exception $e){
      return ['status' => 'fail', 'error' => $e->getMessage()];
    }
  }
}


  // How to use the validate function

//   $exists = $userModel->validateRegister([
//     'username' => 'john_doe',
//     'email' => 'john@example.com'
// ]);

// if (isset($exists['username'])) echo "Username already exists";
// if (isset($exists['email'])) echo "Email already exists";