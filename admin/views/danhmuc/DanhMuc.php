<!-- header -->
<?php include './views/layout/header.php';?>
<!-- End header -->
<!-- Navbar -->
<?php include './views/layout/navbar.php';?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh mục sản phẩm</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                  <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $danhMuc['ten_danh_muc']; ?></td>
                    <td><?php echo $danhMuc['mo_ta']; ?></td>
                    <td>
                      <button class="btn btn-warning">Sửa</button>
                      <button class="btn btn-danger">Xóa</button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
<?php include './views/layout/footer.php';?>
<!-- End Footer-->
<!-- Page specific script -->
<script>
$(function() {
  $(" #example1").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
</script>
</body>

</html>