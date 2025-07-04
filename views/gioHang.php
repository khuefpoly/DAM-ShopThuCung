<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>


<main>
  <!-- breadcrumb area start -->
  <div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb-wrap">
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb area end -->

  <!-- cart main wrapper start -->
  <div class="cart-main-wrapper section-padding">
    <div class="container">
      <div class="section-bg-color">
        <?php if (!empty($chiTietGioHang)) : ?>
          <div class="row">
            <div class="col-lg-12">
              <!-- Cart Table Area -->
              <div class="cart-table table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="pro-thumbnail">Ảnh sản phẩm</th>
                      <th class="pro-title">Tên sản phẩm</th>
                      <th class="pro-price">Giá tiền</th>
                      <th class="pro-quantity">Số lượng</th>
                      <th class="pro-subtotal">Tổng tiền</th>
                      <th class="pro-remove">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tongGioHang = 0;
                    foreach ($chiTietGioHang as $key => $sanPham):
                    ?>
                      <tr>
                        <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                        <td class="pro-title"><a href="#"><?= $sanPham['ten_san_pham'] ?></a></td>
                        <td class="pro-price"><span>
                            <?php if (!empty($sanPham['gia_khuyen_mai']) && $sanPham['gia_khuyen_mai'] != 0) { ?>
                              <?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?>
                              <?php } else { ?><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?>
                            <?php } ?>
                          </span></td>
                        <td class="pro-quantity">
                          <div class="pro-qty"><input type="text" value="<?= $sanPham['so_luong'] ?>"></div>
                        </td>
                        <td class="pro-subtotal"><span>
                            <?php
                            $tongTien = 0;
                            if (!empty($sanPham['gia_khuyen_mai']) && $sanPham['gia_khuyen_mai'] != 0) {
                              $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                            } else {
                              $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                            }
                            $tongGioHang += $tongTien;
                            echo formatPrice($tongTien) . ' đ';
                            ?>
                          </span></td>
                        <td class="pro-remove">
                          <a href="#">
                            <i class="fa fa-trash-o"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- Cart Update Option -->
              <div class="cart-update-option d-block d-md-flex justify-content-between">
                <div class="apply-coupon-wrapper">
                  <form action="#" method="post" class=" d-block d-md-flex">
                    <input type="text" placeholder="Enter Your Coupon Code" required />
                    <button class="btn btn-sqr">Apply Coupon</button>
                  </form>
                </div>
                <div class="cart-update">
                  <a href="#" class="btn btn-sqr">Update Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-5 ml-auto">
              <!-- Cart Calculation Area -->
              <div class="cart-calculator-wrapper">
                <div class="cart-calculate-items">
                  <h6>Tổng đơn hàng</h6>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <td>Tổng tiền sản phẩm</td>
                        <td><?= formatPrice($tongGioHang) . ' đ' ?></td>
                      </tr>
                      <tr class="total">
                        <td>Tổng thanh toán</td>
                        <td class="total-amount"><?= formatPrice($tongGioHang) . ' đ' ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-sqr d-block">Tiến hành đặt hàng</a>
              </div>
            </div>
          </div>
        <?php else : ?>
          <div class="text-center py-5">
            <h4>Giỏ hàng của bạn đang trống</h4>
            <a href="<?= BASE_URL ?>" class="btn btn-sqr mt-3">Tiếp tục mua sắm</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- cart main wrapper end -->
</main>
<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php'; ?>

<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php'; ?>