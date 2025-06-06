<?php
class AdminSanPhamController
{
  public $modelSanPham;
  public $modelDanhMuc;
  public function __construct()
  {
    $this->modelSanPham = new AdminSanPham();
    $this->modelDanhMuc = new AdminDanhMuc();
  }
  public function danhSachSanPham()
  {
    $listSanPham = $this->modelSanPham->getAllSanPham();
    require_once './views/sanpham/listSanPham.php';
  }

  public function formAddSanPham()
  {
    // Hiển thị form nhập
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    require_once './views/sanpham/addSanPham.php';
    // Xóa session sau khi load trang
    deleteSessionError();
  }
  public function postAddSanPham()
  {
    // Hàm này xử lý thêm dữ liệu

    //Kiểm tra xem dữ liệu có phải được submit lên không
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Lấy dữ liệu từ form
      $ten_san_pham = $_POST['ten_san_pham'] ?? '';
      $gia_san_pham = $_POST['gia_san_pham'] ?? '';
      $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
      $so_luong = $_POST['so_luong'] ?? '';
      $ngay_nhap = $_POST['ngay_nhap'] ?? '';
      $danh_muc_id = $_POST['danh_muc_id'] ?? '';
      $trang_thai = $_POST['trang_thai'] ?? '';
      $mo_ta = $_POST['mo_ta'] ?? '';

      $hinh_anh = $_FILES['hinh_anh'] ?? null;
      //Lưu hình ảnh vào
      $file_thumb = uploadFile($hinh_anh, './uploads/');

      //mảng hình ảnh
      $img_array = $_FILES['img_array'];


      //Tạo 1 mảng trống để chứa dữ liệu
      $errors = [];
      if (empty($ten_san_pham)) {
        $errors['ten_san_pham'] = "Tên sản phẩm không được để trống";
      }
      if (empty($gia_san_pham)) {
        $errors['gia_san_pham'] = "Giá sản phẩm không được để trống";
      }
      if (empty($gia_khuyen_mai)) {
        $errors['gia_khuyen_mai'] = "Giá khuyến mãi không được để trống";
      }
      if (empty($so_luong)) {
        $errors['so_luong'] = "Số lượng không được để trống";
      }
      if (empty($ngay_nhap)) {
        $errors['ngay_nhap'] = "Ngày nhập không được để trống";
      }
      if (empty($danh_muc_id)) {
        $errors['danh_muc_id'] = "Danh mục phải chọn";
      }
      if (empty($trang_thai)) {
        $errors['trang_thai'] = "Trạng thái phải chọn";
      }
      if ($hinh_anh['error'] !== 0) {
        $errors['hinh_anh'] = "Phải chọn ảnh sản phẩm";
      }

      $_SESSION['error'] = $errors;

      //Nếu không có lỗi thì tiến hành thêm sản phẩm
      if (empty($errors)) {
        //Nếu không có lỗi thì tiến hành thêm sản phẩm
        $san_pham_id = $this->modelSanPham->insertSanPham(
          $ten_san_pham,
          $gia_san_pham,
          $gia_khuyen_mai,
          $so_luong,
          $ngay_nhap,
          $danh_muc_id,
          $trang_thai,
          $mo_ta,
          $file_thumb
        );

        //Xử lý thêm album ảnh sản phẩm img_array
        if (!empty($img_array['name'])) {
          foreach ($img_array['name'] as $key => $value) {
            $file = [
              'name' => $img_array['name'][$key],
              'type' => $img_array['type'][$key],
              'tmp_name' => $img_array['tmp_name'][$key],
              'error' => $img_array['error'][$key],
              'size' => $img_array['size'][$key]
            ];

            $link_hinh_anh = uploadFile($file, './uploads/');
            $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
          }
        }

        //Chuyển hướng về trang danh sách sản phẩm
        header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
        exit();
      } else {
        //Trả về form và lỗi
        // Đặt chỉ thị xóa session sau khi hiển thị form
        $_SESSION['flash'] = true;
        header('Location: ' . BASE_URL_ADMIN . '?act=form-them-san-pham');
        exit();
      }
    }
  }
  public function formEditSanPham()
  {
    // Hiển thị form nhập
    //Lấy ra thông tin của sản phẩm cần sửa
    $id = $_GET['id_san_pham'];
    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    $listSanPham = $this->modelSanPham->getListAnhSanPham($id);
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    if ($sanPham) {
      require_once './views/sanPham/editSanPham.php';
      deleteSessionError();
    } else {
      header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
      exit();
    }
  }
  public function postEditSanPham()
  {
    // Hàm này xử lý thêm dữ liệu

    //Kiểm tra xem dữ liệu có phải được submit lên không
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Lấy dữ liệu từ form
      // Lấy ra dữ liệu cũ của sản phẩm

      $san_pham_id = $_POST['san_pham_id'] ?? '';

      //Truy vấn
      $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
      $old_file = $sanPhamOld['hinh_anh']; //Lấy ảnh cũ để phục vụ cho sửa ảnh

      $ten_san_pham = $_POST['ten_san_pham'] ?? '';
      $gia_san_pham = $_POST['gia_san_pham'] ?? '';
      $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
      $so_luong = $_POST['so_luong'] ?? '';
      $ngay_nhap = $_POST['ngay_nhap'] ?? '';
      $danh_muc_id = $_POST['danh_muc_id'] ?? '';
      $trang_thai = $_POST['trang_thai'] ?? '';
      $mo_ta = $_POST['mo_ta'] ?? '';

      $hinh_anh = $_FILES['hinh_anh'] ?? null;

      //Tạo 1 mảng trống để chứa dữ liệu
      $errors = [];
      if (empty($ten_san_pham)) {
        $errors['ten_san_pham'] = "Tên sản phẩm không được để trống";
      }
      if (empty($gia_san_pham)) {
        $errors['gia_san_pham'] = "Giá sản phẩm không được để trống";
      }
      if (empty($gia_khuyen_mai)) {
        $errors['gia_khuyen_mai'] = "Giá khuyến mãi không được để trống";
      }
      if (empty($so_luong)) {
        $errors['so_luong'] = "Số lượng không được để trống";
      }
      if (empty($ngay_nhap)) {
        $errors['ngay_nhap'] = "Ngày nhập không được để trống";
      }
      if (empty($danh_muc_id)) {
        $errors['danh_muc_id'] = "Danh mục phải chọn";
      }
      if (empty($trang_thai)) {
        $errors['trang_thai'] = "Trạng thái phải chọn";
      }

      $_SESSION['error'] = $errors;
      //logic sửa ảnh
      $new_file = $old_file;
      if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
        //upload ảnh mới
        $new_file = uploadFile($hinh_anh, './uploads/');
        if (!empty($old_file)) { //Nếu có cảnh cũ thì xóa đi
          deleteFile($old_file); //Xóa ảnh cũ
        }
      }
      //Nếu không có lỗi thì tiến hành thêm sản phẩm
      if (empty($errors)) {
        //Nếu không có lỗi thì tiến hành thêm sản phẩm
        $this->modelSanPham->updateSanPham(
          $san_pham_id,
          $ten_san_pham,
          $gia_san_pham,
          $gia_khuyen_mai,
          $so_luong,
          $ngay_nhap,
          $danh_muc_id,
          $trang_thai,
          $mo_ta,
          $new_file
        );
        //Chuyển hướng về trang danh sách sản phẩm
        header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
        exit();
      } else {
        //Trả về form và lỗi
        // Đặt chỉ thị xóa session sau khi hiển thị form
        $_SESSION['flash'] = true;
        header("Location: ' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham" . $san_pham_id);
        exit();
      }
    }
  }

  // public function deleteDanhMuc()
  // {
  //   // Hàm này xử lý xóa dữ liệu
  //   //Lấy ra thông tin của danh mục cần sửa
  //   $id = $_GET['id_danh_muc'];
  //   $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
  //   if ($danhMuc) {
  //     $this->modelDanhMuc->destroyDanhMuc($id);
  //   }
  //   header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
  //   exit();
  // }
}
