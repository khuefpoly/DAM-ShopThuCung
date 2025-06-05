<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- End header -->
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý sản phẩm</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body row">
                <div class="form-group col-12">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                  <?php if (isset($errors['ten_san_pham'])) { ?>
                    <span class="text-danger"><?= $errors['ten_san_pham'] ?></span>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Giá sản phẩm</label>
                  <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
                  <?php if (isset($errors['gia_san_pham'])) { ?>
                    <span class="text-danger"><?= $errors['gia_san_pham'] ?></span>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Giá khuyến mãi</label>
                  <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                  <?php if (isset($errors['gia_khuyen_mai'])) { ?>
                    <span class="text-danger"><?= $errors['gia_khuyen_mai'] ?></span>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Hình ảnh</label>
                  <input type="file" class="form-control" name="hinh_anh">
                  <?php if (isset($errors['hinh_anh'])) { ?>
                    <span class="text-danger"><?= $errors['hinh_anh'] ?></span>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Album ảnh</label>
                  <input type="file" class="form-control" name="image_array[]" multiple>
                </div>

                <div class="form-group col-6">
                  <label>Số lượng</label>
                  <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                  <?php if (isset($errors['so_luong'])) { ?>
                    <span class="text-danger"><?= $errors['so_luong'] ?></span>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Ngày nhập</label>
                  <input type="date" class="form-control" name="ngay_nhap" placeholder="Chọn ngày">
                  <?php if (isset($errors['ngay_nhap'])) { ?>
                    <span class="text-danger"><?= $errors['ngay_nhap'] ?></span>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Danh mục</label>
                  <select name="danh_muc_id" class="form-control">
                    <option selected disabled>Chọn danh mục sản phẩm</option>
                    <?php foreach ($listDanhMuc as $danhMuc) : ?>
                      <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php if (isset($errors['danh_muc_id'])) { ?>
                    <span class="text-danger"><?= $errors['danh_muc_id'] ?></span>
                  <?php } ?>
                </div>
                <div class="form-group col-6"> <label for="trang_thai">Trạng thái</label>
                  <select name="trang_thai" id="trang_thai" class="form-control">
                    <option selected disabled value="">Chọn trạng thái</option>
                    <option value="1">Còn bán</option>
                    <option value="2">Dừng bán</option>
                  </select>
                  <?php if (isset($errors['trang_thai'])) { ?>
                    <span class="text-danger d-block mt-1"><?= $errors['trang_thai'] ?></span>
                  <?php } ?>
                </div>
                <div class="form-group col-12">
                  <label>Mô tả</label>
                  <textarea name="mo_ta" class="form-control" id="" placeholder="Nhập mô tả"></textarea>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer-->
</body>

</html>