<?php
// session_start();
require_once dirname(__DIR__) . "/model/Product.php";
class ProductController{
  private $model;

  public function __construct(){
    $this->model = new Product();
  }

  public function get(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $data = json_decode(file_get_contents('php://input'), true);
      $sort = trim($data['sort']);
      $search = $data['filter'];
      $page_num = $data['page_num'];
      $limit = 12;
      $offset = ($page_num - 1) * $limit;
      $posts = $this->model->getProducts($sort, $search, $limit, $offset);
      $total = $this->model->getCount($search);
      header('Content-Type: application/json');
      echo json_encode(['status' => 'success', 'data' => $posts, 'total' => ceil($total / 10)]);
      exit();
    }
  }

  public function getRestaurents(){
    $restaurents = $this->model->getRestaurents();
    return $restaurents;
  }

  public function view_product() {
    $id = $_GET['id'];
    $post = $this->model->getProduct($id);
    // require_once dirname(__DIR__) . "/views/user/descproduct.php";
    // exit();
    return $post;
  }
  
  public function delete_product() {
    $id = $_GET['id'];
    $res = $this->model->deleteProduct($id);
    header('Content-Type: application/json');
    echo json_encode($res);
    exit();
  }
  
  public function edit_product() {
    $id = $_GET['id'];
    $data = $this->pre_data();

    $res = $this->model->editProduct($data, $id);
    header('Content-Type: application/json');
    echo json_encode($res);
    exit();
  }
  
  public function add_product() {
    $data = $this->pre_data();
    $data['username'] = $_SESSION['username'];
    $res = $this->model->addProduct($data);
    header('Content-Type: application/json');
    echo json_encode($res);
    exit();
  }
  

  // public function pre_data(){
  //   $data = $_POST;
  //   $savePath = $_SESSION["userid"] . "_" . basename($_FILES['image']);
  //   $data["image"] = $savePath;
  //   return $data;
  // }

  public function pre_data(){
    $data = $_POST;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $filename = $_SESSION["userid"] . "_" . basename($_FILES['image']['name']);

        $originalName = $_FILES['image']['name']; // 
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $targetPath = realpath(dirname(__DIR__) . '/../public/images/') . '/' . $filename;

        $temp = $_FILES['image']['tmp_name'];

        $old = (string)$temp . $extension;

        if (move_uploaded_file($temp, $temp . $extension) === false) {
          var_dump(error_get_last()); // Show errors
          exit;
        } 

        if (rename($old, $targetPath)){
        } else {
          var_dump(error_get_last()); // Show errors
          exit();
        }

        $data["image"] = $filename;
    } else {
        $data["image"] = isset($data["existing_image"]) ? $data["existing_image"] : '';
    }

    return $data;
}

}