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
}