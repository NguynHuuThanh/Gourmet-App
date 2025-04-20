<?php

require_once dirname(__DIR__) . "/../database.php";

class Product {
  private $database;
  public function __construct(){
    $this->database = Database::get_instance();
  }

  public function getRestaurents(){
    $sql = "SELECT * FROM Restaurent";
    $stmt = $this->database->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $temp = $result->fetch_all(MYSQLI_ASSOC);
    return $temp;
  }

  public function getProducts($sort, $filter, $limit, $offset){
    $sql = "SELECT Post.*, Restaurent.*, Post.ID as postID FROM Post JOIN Restaurent ON Post.Restaurent_ID = Restaurent.ID WHERE 1=1";
    $type = "";
    $param = [];

    if (!empty($filter)) {
      if (isset($filter['username']) && $filter['username'] !== ""){
        $sql .= ' AND Username = ?';
        $type .= "s";
        $param = array_merge($param, [$filter['username']]);
      
      }

      if (isset($filter['search'])) {
        $sql .= ' AND ( Postname LIKE ? OR Description LIKE ? OR Res_type LIKE ? OR Location LIKE ? )';
        $type .= "ssss";
        $regex = "%" . $filter['search'] . "%";
        $param = array_merge($param, [$regex, $regex, $regex, $regex]);
      }
    }
    if (!empty($sort)){
      $sql .= " ORDER BY $sort";
    }

    $sql .= " LIMIT ? OFFSET ?";
    $type .= "ii";
    $param = array_merge($param, [$limit, $offset]);

    try {
      $stmt = $this->database->prepare($sql);
      $stmt->bind_param($type, ...$param);
      $stmt->execute();
      $result = $stmt->get_result();
      $temp = $result->fetch_all(MYSQLI_ASSOC);
      foreach ($temp as &$product) {
        if (strlen($product['Description']) > 19) {
          $product['Description'] = substr($product['Description'], 0, 18) . '...';
        }
      }
      return $temp;
    } 
    catch (Exception $e){
      echo $e->getMessage();
      return ['status' => 'fail'];
    }
    
  }

  public function getCount($filter){
    $sql = "SELECT COUNT(*) AS total FROM Post JOIN Restaurent ON Post.Restaurent_ID = Restaurent.ID WHERE 1=1";
    $type = "";
    $param = [];
    if (!empty($filter)) {
      if (isset($filter['username']) && $filter['username'] !== ""){
        $sql .= ' AND Username = ?';
        $type .= "s";
        $param = array_merge($param, [$filter['username']]);
      
      }

      if (isset($filter['search'])) {
        $sql .= ' AND ( Postname LIKE ? OR Description LIKE ? OR Res_type LIKE ? OR Location LIKE ? )';
        $type .= "ssss";
        $regex = "%" . $filter['search'] . "%";
        $param = array_merge($param, [$regex, $regex, $regex, $regex]);
      }
    }
    
    try {
      $stmt = $this->database->prepare($sql);
      if (!empty($param)) $stmt->bind_param($type, ...$param);
      $stmt->execute();
      $result = $stmt->get_result();
      $temp = $result->fetch_all(MYSQLI_ASSOC);
      return $temp[0]['total'];
    } catch (Exception $e){
      echo $e->getMessage();
      return ['status' => 'fail'];
    }
    
  }

  public function getProduct($id){
    $sql = "SELECT * FROM Post JOIN Restaurent ON Post.Restaurent_ID = Restaurent.ID WHERE Post.ID = ?";
    $stmt = $this->database->prepare($sql); 
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function addProduct($data){
    try {
      $sql = "INSERT INTO Post (Price, Image, Postname, Username, Description, Rating, Restaurent_ID)
      VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $this->database->prepare($sql);
      $data['price'] = (double)$data['pricing'];
      $stmt->bind_param("dssssss", $data['price'], $data['image'], $data['postname'], $data['username'], $data['description'], $data['rating'], $data['restaurent_id']);
      $stmt->execute();
      $result = $stmt->get_result();
      return ['status' => 'success'];
    } catch (Exception $e){
      return [ 'status' => 'fail' ,'error' => $e->getMessage()];
    }
  }

  public function editProduct($data, $id){
    try {
      $sql = "UPDATE Post 
      SET Price = ?, Image = ?, Postname = ?, Username = ?, Description = ?, Rating = ?, Restaurent_ID = ?
      WHERE ID = ?";
      $data['price'] = (double)$data['pricing'];
      $stmt = $this->database->prepare($sql);
      $stmt->bind_param("dssssssi", $data['price'], $data['image'], $data['postname'], $data['username'], $data['description'], $data['rating'], $data['restaurent_id'], $id);
      $stmt->execute();
      return ['status' => 'success'];
    } catch (Exception $e){
      return ['status' => 'fail', 'error' => $e->getMessage()];
    }
  }

  public function deleteProduct($id) {
    try {
      $sql = "DELETE FROM Post where ID = ?";
      $stmt = $this->database->prepare($sql);
      $stmt->bind_param("s", $id);
      $stmt->execute();
      return ['status' => 'success'];
    } catch (Exception $e){
      return ['status' => 'fail', 'error' => $e->getMessage()];
    }
  }

  public function addRestaurent($data){
    try {
      $sql = "INSERT INTO Restaurent (ID, Res_name, Res_type, Location)
      VALUES (? , ? , ? , ?)";
      $stmt = $this->database->prepare($sql);
      $stmt->bind_param("ssss", $data['ID'], $data['Res_name'], $data['Res_type'], $data['Location']);
      $stmt->execute();
      $result = $stmt->get_result();
      return ['status' => 'success'];
    } catch (Exception $e){
      return ['status' => 'fail', 'error' => $e->getMessage()];
    }
  }

  public function editRestaurent($data, $id){
    try {
      $sql = "UPDATE Restaurent
      SET Res_name = ?, Res_type = ?, Location = ?
      WHERE ID = ?";
      $stmt = $this->database->prepare($sql);
      $stmt->bind_param("ssss", $data['Res_name'], $data['Res_type'], $data['Location'], $id);
      $stmt->execute();
      return ['status' => 'success'];
    } catch (Exception $e){
      return ['status' => 'fail' , 'error' => $e->getMessage()];
    }
  }

  public function deleteRestaurent($id){
    try {
      $sql = "DELETE FROM Restaurent WHERE ID = ?";
      $stmt = $this->database->prepare($sql);
      $stmt->bind_param("s", $id);
      $stmt->execute();
      return ['status' => 'success'];
    } catch (Exception $e){
      return ['status' => 'fail', 'error' => $e->getMessage()];
    }
  }

}
