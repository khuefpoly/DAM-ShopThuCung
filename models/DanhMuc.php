<?php
class DanhMuc
{
  public $conn; //Khai báo phương thức

  public function __construct()
  {
    $this->conn = connectDB();
  }
  public function getAllDanhMuc()
  {
    try {
      $sql = "SELECT danh_mucs.*, COUNT(san_phams.id) AS so_luong
            FROM danh_mucs
            LEFT JOIN san_phams ON danh_mucs.id = san_phams.danh_muc_id
            GROUP BY danh_mucs.id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }
}
