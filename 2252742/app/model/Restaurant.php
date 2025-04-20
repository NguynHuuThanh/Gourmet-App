<?php

require_once dirname(__DIR__) . "/../database.php";

class Restaurant{
  private $database;

  public function __construct(){
    $this->database = Database::get_instance();
  }

  public function getRestaurents($sort, $search, $limit, $offset){

  }

  public function getCount($search){

  }

  public function getRestaurent($id){
    $sql = "SELECT * FROM Restaurent WHERE ID = ?";
    $stmt = $this->database->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

}