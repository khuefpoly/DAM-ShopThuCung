<?php

class HomeController
{
  public $modelSanPham;
  public $modelTaiKhoan;

  public function __construct()
  {
    // Khởi tạo model SanPham
    $this->modelSanPham = new SanPham();
    $this->modelTaiKhoan = new TaiKhoan();
  }

  public function  home()
  {
    $listSanPham = $this->modelSanPham->getAllSanPham();
    require_once './views/home.php';
  }
  public function chiTietSanPham()
  {
    $id = $_GET['id_san_pham'];

    $sanPham = $this->modelSanPham->getDetailSanPham($id);

    $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

    $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

    $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
    // var_dump($listSanPhamCungDanhMuc);
    // die;
    if ($sanPham) {
      require_once './views/detailSanPham.php';
    } else {
      header('Location: ' . BASE_URL . '?act=san-pham');
      exit();
    }
  }
  public function formLogin()
  {
    require_once './views/auth/formLogin.php';
    deleteSessionError();
    exit();
  }

  public function postLogin()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // lấy email và pass gửi lên từ form
      $email = $_POST['email'] ?? '';
      $password = $_POST['password'] ?? '';

      //xử lý kiểm tra thông tin đăng nhập
      $user = $this->modelTaiKhoan->checkLogin($email, $password);
      if ($user == $email) { // trường hợp đăng nhập thành công
        //Lưu thông tin vào  SESSION
        $_SESSION['user_client'] = $user;
        header('Location: ' . BASE_URL);
        exit();
      } else {
        //Lỗi thì lưu vào SESSION
        $_SESSION['error'] = $user;
        // var_dump($_SESSION['error']);
        // die;
        $_SESSION['flash'] = true;
        header('Location: ' . BASE_URL . '?act=login');
        exit();
      }
    }
  }
}
