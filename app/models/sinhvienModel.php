<?php
require_once '../app/core/connectDB.php';
class SinhvienModel {
    private $conn;
    public function __construct(){
        
        $this -> conn = ConnectDB::Connect();

    }
    public function getAllSinhvien() {
        $query = "SELECT * FROM tbl_sinhviens";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($MSSV, $HoTen, $GioiTinh, $LopQL)
  {
    $query = "INSERT INTO sinhvien (MSSV, HoTen, GioiTinh, LopQL) VALUES ( :MSSV, :HoTen, :GioiTinh, :LopQL )";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MSSV', $MSSV);
    $stmt->bindParam(':HoTen', $HoTen);
    $stmt->bindParam(':GioiTinh', $GioiTinh);
    $stmt->bindParam(':LopQL', $LopQL);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function paging($limit = 5, $offset = 0, $search = "")
  {
    $query = "SELECT * FROM tbl_sinhviens LIMIT :limit OFFSET :offset";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Tính tổng số bảng ghi
    $selectAllQuery = $this->conn->query("SELECT COUNT(*) FROM tbl_sinhviens");
    $totalRecords = $selectAllQuery->fetchColumn();

    $totalPages = ceil($totalRecords / $limit);

    return ['sinhviens' => $result, 'totalPages' => $totalPages];
  }
  public function update($MSSV, $HoTen, $GioiTinh, $LopQL)
  {
    $query = "UPDATE tbl_sinhviens SET HoTen = :HoTen, GioiTinh = :GioiTinh, LopQL = :LopQL WHERE MSSV = :MSSV";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MSSV', $MSSV);
    $stmt->bindParam(':HoTen', $HoTen);
    $stmt->bindParam(':GioiTinh', $GioiTinh);
    $stmt->bindParam(':LopQL', $LopQL);
    return $stmt->execute();
  }

  public function getSinhVienById($MSSV)
  {
    $query = "SELECT * FROM tbl_sinhviens WHERE MSSV = :MSSV";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MSSV', $MSSV);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function delete($MSSV)
  {
    $query = "DELETE FROM tbl_sinhviens WHERE MSSV = :MSSV";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MSSV', $MSSV);
    return $stmt->execute();
  }
}