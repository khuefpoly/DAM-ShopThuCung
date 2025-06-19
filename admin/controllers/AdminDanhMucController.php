<?php
class AdminDanhMucController
{
  public $modelDanhMuc;
  public function __construct()
  {
    $this->modelDanhMuc = new AdminDanhMuc();
  }
  public function danhSachDanhMuc()
  {
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    require_once './views/danhmuc/listDanhMuc.php';
  }

  public function formAddDanhMuc()
  {
    // Hiển thị form nhập
    require_once './views/danhmuc/addDanhMuc.php';
    // Xóa session sau khi load trang
    deleteSessionError();
  }
  public function postAddDanhMuc()
  {
    // Hàm này xử lý thêm dữ liệu

    //Kiểm tra xem dữ liệu có phải được submit lên không
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Lấy dữ liệu từ form
      $ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
      $mo_ta = $_POST['mo_ta'] ?? '';

      //Tạo 1 mảng trống để chứa dữ liệu
      $errors = [];
      if (empty($ten_danh_muc)) {
        $errors['ten_danh_muc'] = "Tên danh mục không được để trống";
      }

      $_SESSION['error'] = $errors;

      //Nếu không có lỗi thì tiến hành thêm danh mục
      if (empty($errors)) {
        //Nếu không có lỗi thì tiến hành thêm danh mục
        $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
        //Chuyển hướng về trang danh sách danh mục
        $_SESSION['success'] = "Thêm danh mục thành công!";
        header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
      } else {
        //Trả về form và lỗi
        $_SESSION['flash'] = true;
        header('Location: ' . BASE_URL_ADMIN . '?act=form-them-danh-muc');
        exit();
      }
    }
  }
  public function formEditDanhMuc()
  {
    // Hiển thị form nhập
    //Lấy ra thông tin của danh mục cần sửa
    $id = $_GET['id_danh_muc'];
    $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    if ($danhMuc) {
      require_once './views/danhmuc/editDanhMuc.php';
    } else {
      header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
      exit();
    }
  }
  public function postEditDanhMuc()
  {
    // Hàm này xử lý thêm dữ liệu

    //Kiểm tra xem dữ liệu có phải được submit lên không
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Lấy dữ liệu từ form

      $id = $_POST['id'];
      $ten_danh_muc = $_POST['ten_danh_muc'];
      $mo_ta = $_POST['mo_ta'];

      //Tạo 1 mảng trống để chứa dữ liệu
      $errors = [];
      if (empty($ten_danh_muc)) {
        $errors['ten_danh_muc'] = "Tên danh mục không được để trống";
      }

      //Nếu không có lỗi thì tiến hành thêm danh mục
      if (empty($errors)) {
        //Nếu không có lỗi thì tiến hành thêm danh mục
        $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
        //Chuyển hướng về trang danh sách danh mục
        $_SESSION['success'] = "Sửa danh mục thành công!";
        header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
      } else {
        //Trả về form và lỗi
        $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
        require_once './views/danhmuc/editDanhMuc.php';
      }
    }
  }

  public function deleteDanhMuc()
  {
    // Hàm này xử lý xóa dữ liệu
    //Lấy ra thông tin của danh mục cần sửa
    $id = $_GET['id_danh_muc'];
    $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    if ($danhMuc) {
      $this->modelDanhMuc->destroyDanhMuc($id);
    }
    $_SESSION['success'] = "Xóa danh mục thành công!";
    header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
    exit();
  }
}
