<?php
require_once '../app/core/connectDB.php';
class lopqlModel
{
  private $conn;
  public function __construct()
  {
    $this->conn = ConnectDB::Connect();
  }

  public function getAllLopHoc()
  {
    $query = "SELECT * FROM tbl_lopqls";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($MaLop, $TenLop, $GhiChu)
  {
    $query = "INSERT INTO tbl_lopqls (MaLop, TenLop, GhiChu) VALUES ( :MaLop, :TenLop, :GhiChu )";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MaLop', $MaLop);
    $stmt->bindParam(':TenLop', $TenLop);
    $stmt->bindParam(':GhiChu', $GhiChu);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function paging($limit = 5, $offset = 0, $search = "")
  {
    $searchParam = "%" . $search . "%";

    // Query lấy dữ liệu trang hiện tại
    $query = "SELECT * FROM tbl_lopqls  
              WHERE MaLop  LIKE :search
                 OR TenLop LIKE :search
              LIMIT :limit OFFSET :offset";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':search', $searchParam);
    $stmt->bindParam(':limit',  $limit,  PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $countQuery = "SELECT COUNT(*) FROM tbl_lopqls
                   WHERE MaLop  LIKE :search
                      OR TenLop LIKE :search";

    $countStmt = $this->conn->prepare($countQuery);
    $countStmt->bindParam(':search', $searchParam);
    $countStmt->execute();
    $totalRecords = $countStmt->fetchColumn();

    $totalPages = ($limit > 0) ? ceil($totalRecords / $limit) : 1;

    return [
      'lopqls'     => $result,
      'totalPages' => $totalPages,  
    ];
  }

  public function getLopQLById($id)
  {
    $query = "SELECT * FROM tbl_lopqls WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update($id, $MaLop, $TenLop, $GhiChu)
  {
    $query = "UPDATE tbl_lopqls SET MaLop = :MaLop, TenLop = :TenLop, GhiChu = :GhiChu WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':MaLop', $MaLop);
    $stmt->bindParam(':TenLop', $TenLop);
    $stmt->bindParam(':GhiChu', $GhiChu);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete($MaLop)
  {
    $query = "DELETE FROM tbl_lopqls WHERE MaLop = :MaLop";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':MaLop', $MaLop);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
}