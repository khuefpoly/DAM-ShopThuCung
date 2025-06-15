<?php

class HomeController
{
  public $modelSanPham;

  public function __construct()
  {
    // Khởi tạo model SanPham
    $this->modelSanPham = new SanPham();
  }

  public function  home()
  {
    $listSanPham = $this->modelSanPham->getAllSanPham();
    require_once './views/home.php';
  }
  public function trangChu()
  {
    echo "Đây là trang chủ của tôi";
  }
}
