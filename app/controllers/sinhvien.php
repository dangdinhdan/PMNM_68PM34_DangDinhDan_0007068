<?php
require_once '../app/core/controller.php';
class sinhvien extends controller
{
  public function index()
  {
    $sinhvienModel = $this->model('sinhvienModel');
    $sinhviens = $sinhvienModel -> getAllSinhvien();  
    $this->view("sinhvien/index", ['sinhviens' => $sinhviens, 'title' => 'danh sach sinh vien']);
  }

  public function create()
  {
   
    require_once "../app/views/sinhvien/create.php";
  }

  public function store()
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $MSSV = $_POST['MSSV'];
      $HoTen = $_POST['HoTen'];
      $GioiTinh = $_POST['GioiTinh'];
      $LopQL = $_POST['LopQL'];

      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->create($MSSV, $HoTen, $GioiTinh);
      if ($result) {
        header("Location: /sinhvien/index");
        exit();
      } else {
        echo "Thêm mới sinh viên thất bại!";
        exit();
      }
    }
  }
}