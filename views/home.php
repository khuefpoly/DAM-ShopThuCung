<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>


<main>
  <!-- service policy area start -->
  <div class="service-policy section-padding">
    <div class="container">
      <div class="row mtn-30">
        <div class="col-sm-6 col-lg-3">
          <div class="policy-item">
            <div class="policy-icon">
              <i class="pe-7s-plane"></i>
            </div>
            <div class="policy-content">
              <h6>Giao hàng</h6>
              <p>Miễn phí giao hàng</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="policy-item">
            <div class="policy-icon">
              <i class="pe-7s-help2"></i>
            </div>
            <div class="policy-content">
              <h6>Hỗ trợ</h6>
              <p>Hỗ trợ 24/07</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="policy-item">
            <div class="policy-icon">
              <i class="pe-7s-back"></i>
            </div>
            <div class="policy-content">
              <h6>Hoàn tiền</h6>
              <p>Hoàn tiền trong 30 ngày khi bị lỗi</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="policy-item">
            <div class="policy-icon">
              <i class="pe-7s-credit"></i>
            </div>
            <div class="policy-content">
              <h6>Thanh toán</h6>
              <p>Bảo mật thanh toán</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- service policy area end -->
  <!-- product area start -->
  <section class="product-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- section title start -->
          <div class="section-title text-center">
            <h2 class="title">Sản phẩm của chúng tôi</h2>
            <p class="sub-title">Sản phẩm được cập nhật liên tục</p>
          </div>
          <!-- section title start -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="product-container">
            <!-- product tab menu end -->

            <!-- product tab content start -->
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tab1">
                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                  <?php foreach ($listNewSanPham as $key => $sanPham): ?>
                    <!-- product item start -->
                    <div class="product-item">
                      <figure class="product-thumb">
                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                          <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                          <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                        </a>
                        <div class="product-badge">
                          <?php
                          $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                          $ngayHienTai = new DateTime();
                          $tinhNgay = $ngayHienTai->diff($ngayNhap);
                          if ($tinhNgay->days <= 7) {
                          ?>
                            <div class="product-label new">
                              <span>Mới</span>
                            </div>
                          <?php
                          }
                          ?>
                          <?php if (!empty($sanPham['gia_khuyen_mai']) && $sanPham['gia_khuyen_mai'] != 0) { ?>

                            <div class="product-label discount">
                              <span>Giảm giá</span>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="cart-hover">
                          <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                            <button class="btn btn-cart">Xem chi tiết</button>
                          </a>
                        </div>
                      </figure>
                      <div class="product-caption text-center">
                        <h6 class="product-name">
                          <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><?= $sanPham['ten_san_pham'] ?></a>
                        </h6>
                        <?php if (!empty($sanPham['gia_khuyen_mai']) && $sanPham['gia_khuyen_mai'] != 0) { ?>
                          <div class="price-box">
                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                            <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></del></span>
                          </div>
                        <?php } else { ?>
                          <div class="price-box">
                            <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></span>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <!-- product item end -->
                  <?php endforeach ?>
                </div>
              </div>
            </div>
            <!-- product tab content end -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- group product start -->
  <section class="group-product-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="group-product-banner">
            <figure class="banner-statistics">
              <a href="#">
                <img src="assets/img/banner/banner_doc.png" style="height: 425px;" alt="product banner">
              </a>
            </figure>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="categories-group-wrapper">
            <!-- section title start -->
            <div class="section-title-append">
              <h4>Sản phẩm khuyến mại</h4>
              <div class="slick-append"></div>
            </div>
            <!-- section title start -->

            <!-- group list carousel start -->
            <div class="group-list-item-wrapper">
              <div class="group-list-carousel">
                <?php foreach ($listSanPhamKhuyenMai as $key => $sanPham): ?>
                  <!-- group list item start -->
                  <div class="group-slide-item">
                    <div class="group-item">
                      <div class="group-item-thumb">
                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                          <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
                        </a>
                      </div>
                      <div class="group-item-desc">
                        <h5 class="group-product-name"><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                            <?= $sanPham['ten_san_pham'] ?></a></h5>

                        <?php if (!empty($sanPham['gia_khuyen_mai']) && $sanPham['gia_khuyen_mai'] != 0) { ?>
                          <div class="price-box">
                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                            <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></del></span>
                          </div>
                        <?php } else { ?>
                          <div class="price-box">
                            <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></span>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <!-- group list item end -->
                <?php endforeach ?>
              </div>
            </div>
            <!-- group list carousel start -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- group product end -->
  <!-- product area end -->
  <!-- featured product area start -->
  <section class="feature-product section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- section title start -->
          <div class="section-title text-center">
            <h2 class="title">SHOP BÁN CHÓ MÈO CẢNH</h2>
          </div>
          <!-- section title start -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
            <?php foreach ($listSanPhamLimit12 as $key => $sanPham): ?>
              <!-- product item start -->
              <div class="product-item">
                <figure class="product-thumb">
                  <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                  </a>
                  <div class="product-badge">
                    <?php
                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                    $ngayHienTai = new DateTime();
                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                    if ($tinhNgay->days <= 7) {
                    ?>
                      <div class="product-label new">
                        <span>Mới</span>
                      </div>
                    <?php
                    }
                    ?>
                    <?php if (!empty($sanPham['gia_khuyen_mai']) && $sanPham['gia_khuyen_mai'] != 0) { ?>

                      <div class="product-label discount">
                        <span>Giảm giá</span>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="cart-hover">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                      <button class="btn btn-cart">Xem chi tiết</button>
                    </a>
                  </div>
                </figure>
                <div class="product-caption text-center">
                  <h6 class="product-name">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><?= $sanPham['ten_san_pham'] ?></a>
                  </h6>
                  <?php if (!empty($sanPham['gia_khuyen_mai']) && $sanPham['gia_khuyen_mai'] != 0) { ?>
                    <div class="price-box">
                      <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                      <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></del></span>
                    </div>
                  <?php } else { ?>
                    <div class="price-box">
                      <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></span>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <!-- product item end -->
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- featured product area end -->


</main>
<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php'; ?>
<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php'; ?>