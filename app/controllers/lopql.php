<?php
require_once '../app/core/Controller.php';
class lopql extends Controller
{
  public function index($limit = 5, $offset = 0, $search = "")
  {
    $lopqlModel = $this->model('lopqlModel');
    $result = $lopqlModel->paging($limit, $offset, $search);
    $lopqls = $result['lopqls'];    
    $totalPages = $result['totalPages'];
    // Trả về View  
    $this->view('layout/layoutmaster', ['viewname' => 'lopql/index', 'lopqls' => $lopqls, 'title' => 'Danh sách lớp quản lý', 'totalPages' => $totalPages]);
  }

  public function create()
  {
    // Trả về View
    $this->view('layout/layoutmaster', ['viewname' => 'lopql/create', 'title' => 'Tạo lớp quản lý']);
  }

  public function store()
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $MaLop = $_POST['MaLop'];
      $TenLop = $_POST['TenLop'];
      $GhiChu = $_POST['GhiChu'];

      $lopqlModel = $this->model('lopqlModel');
      $result = $lopqlModel->create($MaLop, $TenLop, $GhiChu);
      if ($result) {
        header("Location: /lopql/index");
        exit();
      } else {
        echo "Thêm mới lớp học thất bại!";
        exit();
      }
    }
  }

  public function edit($MaLop)
  {
    $lopqlModel = $this->model('lopqlModel');
    $lopql = $lopqlModel->getLopQLById($MaLop);

    if (!$lopql) {
      echo "Lớp quản lý không tồn tại!";
      exit();
    }

    $this->view('layout/layoutmaster', ['viewname' => 'lopql/edit', 'lopql' => $lopql, 'title' => 'Sửa thông tin Lớp quản lý']);
  }

  public function update($id)
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = (int)$id;
      $MaLop = $_POST['MaLop'];
      $TenLop = $_POST['TenLop'];
      $GhiChu = $_POST['GhiChu'];

      $lopqlModel = $this->model('lopqlModel');
      $result = $lopqlModel->update($id, $MaLop, $TenLop, $GhiChu);
      if ($result) {
        header("Location: /lopql/index");
        exit();
      } else {
        echo "Cập nhật lớp học thất bại!";
        exit();
      }
    }
  }

  public function delete($id)
  {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = (int)$id;
      $lopqlModel = $this->model('lopqlModel');
      $result = $lopqlModel->delete($id);
      if ($result) {
        header("Location: /lopql/index");
        exit();
      } else {
        echo "Xóa lớp học thất bại!";
        exit();
      }
    } else {
      header("Location: /lopql/index");
      exit();
    }
  }
}