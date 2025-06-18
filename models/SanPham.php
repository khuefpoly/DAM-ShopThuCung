<?php
class SanPham
{
  public $conn; //Khai báo phương thức

  public function __construct()
  {
    $this->conn = connectDB();
  }
  //Hàm lấy toàn bộ danh sách sản phẩm
  public function getSanPhamLimit12()
  {
    try {
      $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
              FROM san_phams
              INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id ORDER BY san_phams.id DESC LIMIt 12';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi' . $e->getMessage();
    }
  }
  public function getNewSanPham()
  {
    try {
      $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
              FROM san_phams
              INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id ORDER BY san_phams.id DESC LIMIt 4';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi' . $e->getMessage();
    }
  }
  public function getAllSanPham()
  {
    try {
      $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
              FROM san_phams
              INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id ORDER BY san_phams.id DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi' . $e->getMessage();
    }
  }
  public function getSanPhamTheoDanhMuc($danhMucId)
  {
    try {
      $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id = :danh_muc_id
            ORDER BY san_phams.id DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':danh_muc_id', $danhMucId, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi: ' . $e->getMessage();
    }
  }

  public function getDetailSanPham($id)
  {
    try {
      $sql = "SELECT san_phams. *, danh_mucs.ten_danh_muc FROM san_phams
      INNER JOIN danh_mucs
      ON san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':id' => $id]);
      return $stmt->fetch();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
  public function getListAnhSanPham($id)
  {
    try {
      $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':id' => $id]);
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
  public function getBinhLuanFromSanPham($id)
  {
    try {
      $sql = "SELECT binh_luans. *, tai_khoans.ho_ten, tai_khoans.anh_dai_dien FROM binh_luans
      INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
      WHERE binh_luans.san_pham_id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':id' => $id]);
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo "Lỗi" . $e->getMessage();
    }
  }
  public function getListSanPhamDanhMuc($danh_muc_id)
  {
    try {
      $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
              FROM san_phams
              INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.danh_muc_id =' . $danh_muc_id;
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $e) {
      echo 'Lỗi' . $e->getMessage();
    }
  }
}
