<?php

class HomeController
{
  public $modelSanPham;
  public $modelTaiKhoan;
  public $modelGioHang;
  public $modelDonHang;

  public function __construct()
  {
    // Khởi tạo model SanPham
    $this->modelSanPham = new SanPham();
    $this->modelTaiKhoan = new TaiKhoan();
    $this->modelGioHang = new GioHang();
    $this->modelDonHang = new DonHang();
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

  public function addGioHang()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_SESSION['user_client'])) {
        $mail =  $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        // var_dump($mail['id']);
        // die;
        //Lấy dữ liệu giỏ hàng của người dùng
        $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
        if (!$gioHang) {
          $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
          // gán lại id
          $gioHang = ['id' => $gioHangId];
          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        } else {
          $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }
        $san_pham_id = $_POST['san_pham_id'];
        $so_luong = $_POST['so_luong'];
        $checkSanPham = false;
        foreach ($chiTietGioHang as $detail) {
          if ($detail['san_pham_id'] == $san_pham_id) {
            $newSoLuong = $detail['so_luong'] + $so_luong;
            $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
            $checkSanPham = true;
            break;
          }
        }
        if (!$checkSanPham) {
          $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
        }
        header("Location:" . BASE_URL . '?act=gio-hang');
      } else {
        var_dump('Chưa đăng nhập');
        die;
      }
    }
  }
  public function gioHang()
  {
    if (isset($_SESSION['user_client'])) {
      $mail =  $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      //Lấy dữ liệu giỏ hàng của người dùng
      $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
      if (!$gioHang) {
        $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
        // gán lại id
        $gioHang = ['id' => $gioHangId];
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      } else {
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      }

      require_once './views/gioHang.php';
    } else {
      header("Location:" . BASE_URL . "?act=login");
    }
  }
  public function thanhToan()
  {
    if (isset($_SESSION['user_client'])) {
      $user =  $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      //Lấy dữ liệu giỏ hàng của người dùng
      $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
      if (!$gioHang) {
        $gioHangId = $this->modelGioHang->addGioHang($user['id']);
        $gioHang = ['id' => $gioHangId];
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      } else {
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
      }

      require_once './views/thanhToan.php';
    } else {
      header("Location:" . BASE_URL . "?act=login");
    }
  }

  public function postThanhToan()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
      $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
      $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
      $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
      $ghi_chu = $_POST['ghi_chu'];
      $tong_tien = $_POST['tong_tien'];
      $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

      $ngay_dat = date('Y-m-d');
      $trang_thai_id = 1;

      $user =  $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      $tai_khoan_id = $user['id'];
      //Thêm thông tin vào db
      $ma_don_hang = 'DH - ' . rand(1000, 9999);
      $donHang = $this->modelDonHang->addDonHang(
        $tai_khoan_id,
        $ten_nguoi_nhan,
        $email_nguoi_nhan,
        $sdt_nguoi_nhan,
        $dia_chi_nguoi_nhan,
        $ghi_chu,
        $tong_tien,
        $phuong_thuc_thanh_toan_id,
        $ngay_dat,
        $ma_don_hang,
        $trang_thai_id
      );
      //lấy thông tin giỏ hàng của người dùng
      $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

      //Lưu sản phẩm vào chi tiết đơn hàng
      if ($donHang) {
        //Lấy ra toàn bộ sản phẩm trong giỏ hàng
        $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        //Thêm từng sản phẩm từ giỏ hàng vào bảng chi tiết đơn hàng
        foreach ($chiTietGioHang as $item) {
          $donGia = (!empty($item['gia_khuyen_mai']) && $item['gia_khuyen_mai'] != 0)
            ? $item['gia_khuyen_mai']
            : $item['gia_san_pham']; // Ưu tiên đơn giá sẽ lấy giá khuyến mãi
          $this->modelDonHang->addChiTietDonHang(
            $donHang, //ID đơn hàng vừa tạo
            $item['san_pham_id'], //id sản phẩm
            $donGia, //đơn giá lấy từ sản phẩm
            $item['so_luong'], //Số lượng
            $donGia * $item['so_luong'] //thành tiền
          );
        }
        //Sau khi thêm xong thì phải tiến hành xóa sản phẩm trong giỏ hàng
        //Xóa toàn bộ trong chi tiết giỏ hàng

        $this->modelGioHang->clearDetailGioHang($gioHang['id']);
        //Xóa thông tin giỏ hàng người dùng
        $this->modelGioHang->clearGioHang($gioHang['id']);
        //Chuyển hướng về trang lịch sử mua hàng
        header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
        exit();
      } else {
        var_dump('Lỗi vui lòng thử lại sau');
        die;
      }
    }
  }


  public function lichSuMuaHang()
  {
    if (isset($_SESSION['user_client'])) {
      //Lấy ra thông tin tài khoản đăng nhập
      $user =  $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      $tai_khoan_id = $user['id'];
      //Lấy ra danh sách trạng thái đơn hàng
      $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
      $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
      //Lấy ra danh sách phương thức thanh toán
      $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
      $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
      //Lấy ra danh sách tất cả đơn hàng của tài khoản
      $donHangs  = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
      require_once "./views/lichSuMuaHang.php";
    } else {
      var_dump('Bạn chưa đăng nhập');
      die;
    }
  }
  public function chiTietMuaHang()
  {
    if (isset($_SESSION['user_client'])) {
      //Lấy ra thông tin tài khoản đăng nhập
      $user =  $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      $tai_khoan_id = $user['id'];

      //lấy id đơn hàng truyền từ url
      $donHangId = $_GET['id'];
      //Lấy ra danh sách trạng thái đơn hàng
      $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
      $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
      //Lấy ra danh sách phương thức thanh toán
      $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
      $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

      //Lấy ra thông tin đơn hàng theo ID
      $donHang = $this->modelDonHang->getDonHangById($donHangId);

      //lấy thông tin sản phẩm của đơn hàng trong bảng chi tiết đơn hàng
      $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);
      if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
        echo 'Bạn không có quyền truy cập đơn hàng này';
        exit();
      }

      require_once "./views/chiTietMuaHang.php";
    } else {
      var_dump('Bạn chưa đăng nhập');
      die;
    }
  }
  public function huyDonHang()
  {
    if (isset($_SESSION['user_client'])) {
      //Lấy ra thông tin tài khoản đăng nhập
      $user =  $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
      $tai_khoan_id = $user['id'];

      //lấy id đơn hàng truyền từ url
      $donHangId = $_GET['id'];

      //Kiểm tra đơn hàng
      $donHang = $this->modelDonHang->getDonHangById($donHangId);
      if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
        echo 'Bạn k có quyền hủy đơn hàng này';
        exit;
      }
      if ($donHang['trang_thai_id'] != 1) {
        echo "Chỉ đơn hàng ở trạng thái 'Chưa xác nhận' mới có thể hủy ";
        exit;
      }
      //Hủy đơn hàng
      $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);
      header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
      exit();
    } else {
      var_dump('Bạn chưa đăng nhập');
      die;
    }
  }
}
