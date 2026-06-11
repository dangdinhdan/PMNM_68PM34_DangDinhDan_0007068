<?php
require_once '../app/core/controller.php';
class sinhvien extends controller
{
  public function index($limit = 5, $offset = 0, $search = "")
  {
    $sinhvienModel = $this->model('sinhvienModel');
    //$sinhviens = $sinhvienModel->getAllSinhVien();
    $result = $sinhvienModel->paging($limit, $offset, $search);
    $sinhviens = $result['sinhviens'];
    $totalPages = $result['totalPages'];
    // Trả về View
    //require_once "../app/views/sinhvien/index.php";
    $this->view('layout/layoutmaster', ['viewname' => 'sinhvien/index', 'sinhviens' => $sinhviens, 'title' => 'Danh sách sinh viên', 'totalPages' => $totalPages]);
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

  public function edit($MSSV)
  {
    $id = (int)$MSSV;
    $sinhvienModel = $this->model('sinhvienModel');
    $sinhvien = $sinhvienModel->getSinhVienById($id);

    if (!$sinhvien) {
      echo "Sinh viên không tồn tại!";
      exit();
    }

    $this->view('layout/layoutmaster', ['viewname' => 'sinhvien/edit', 'sinhvien' => $sinhvien, 'title' => 'Sửa thông tin Sinh viên']);
  }
  public function update()
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $MSSV = $_POST['MSSV'];
      $HoTen = $_POST['HoTen'];
      $GioiTinh = $_POST['GioiTinh'];
      $LopQL = $_POST['LopQL'];

      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->update($MSSV, $HoTen, $GioiTinh, $LopQL);
      if ($result) {
        header("Location: /sinhvien/index");
        exit();
      } else {
        echo "Cập nhật sinh viên thất bại!";
        exit();
      }
    }
  }
  public function delete($MSSV)
  {
    $id = (int)$MSSV;
    $sinhvienModel = $this->model('sinhvienModel');
    $result = $sinhvienModel->delete($id);

    if ($result) {
      header("Location: /sinhvien/index");
      exit();
    } else {
      echo "Xoá sinh vien thất bại!";
      exit();
    }
  }
}