<?php
class AdminTaiKhoanController
{
  public $modelTaiKhoan;
  public function __construct()
  {
    $this->modelTaiKhoan = new AdminTaiKhoan();
  }

  public function danhSachQuanTri()
  {
    $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
    require_once './views/taikhoan/quantri/listQuanTri.php';
  }
  public function formAddQuanTri()
  {
    require_once './views/taikhoan/quantri/addQuanTri.php';
    deleteSessionError();
  }

  public function postAddQuanTri()
  {
    // Hàm này xử lý thêm dữ liệu

    //Kiểm tra xem dữ liệu có phải được submit lên không
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Lấy dữ liệu từ form
      $ho_ten = $_POST['ho_ten'];
      $email = $_POST['email'];

      //Tạo 1 mảng trống để chứa dữ liệu
      $errors = [];
      if (empty($ho_ten)) {
        $errors['ho_ten'] = "Họ tên không được để trống";
      }
      if (empty($email)) {
        $errors['email'] = "Email không được để trống";
      }

      $_SESSION['error'] = $errors;

      //Nếu không có lỗi thì tiến hành thêm tài khoản
      if (empty($errors)) {
        //Nếu không có lỗi thì tiến hành thêm tài khoản

        //đặt password mặc định - 123@123ab
        $password = password_hash('123@123ab', PASSWORD_BCRYPT);
        // Khai báo chức vụ
        $chuc_vu_id = 1;
        $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);

        header('Location: ' . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
        exit();
      } else {
        //Trả về form và lỗi
        $_SESSION['flash'] = true;
        header('Location: ' . BASE_URL_ADMIN . '?act=form-them-quan-tri');
        exit();
      }
    }
  }
}
