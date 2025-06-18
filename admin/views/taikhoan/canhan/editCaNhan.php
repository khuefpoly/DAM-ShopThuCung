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
          <h1>Quản lý tài khoản cá nhân</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->

        <div class="col-md-3">
          <div class="text-center">
            <img src="<?= BASE_URL . $thongTin['anh_dai_dien']; ?>" style="width: 100px;" class="avatar img-circle" alt="avatar" onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200929003010'">
            <h6 class="mt-2">Họ tên: <?= $thongTin['ho_ten'] ?> </h6>
            <h6 class="mt-2">Chức vụ: <?= $thongTin['chuc_vu_id'] ?> </h6>
          </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
          <h3>Đổi mật khẩu</h3>
          <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a>
              <i class="fa fa-coffee"></i>
              <?= $_SESSION['success'] ?>
            </div>
          <?php } ?>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="post">
            <div class="form-group">
              <label class="col-md-3 control-label">Mật khẩu cũ:</label>
              <div class="col-md-12">
                <input class="form-control" type="password" value="" name="old_pass">
                <?php if (isset($_SESSION['error']['old_pass'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['old_pass'] ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Mật khẩu mới:</label>
              <div class="col-md-12">
                <input class="form-control" type="password" value="" name="new_pass">
                <?php if (isset($_SESSION['error']['new_pass'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['new_pass'] ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Nhập lại mật khẩu mới:</label>
              <div class="col-md-12">
                <input class="form-control" type="password" value="" name="confirm_pass">
                <?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Save Changes">
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
    <hr>
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