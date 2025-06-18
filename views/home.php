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
                          <button class="btn btn-cart">Xem chi tiết</button>
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
                    <button class="btn btn-cart">Xem chi tiết</button>
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

  <!-- testimonial area start -->
  <section class="testimonial-area section-padding bg-img" data-bg="assets/img/testimonial/testimonials-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- section title start -->
          <div class="section-title text-center">
            <h2 class="title">testimonials</h2>
            <p class="sub-title">What they say</p>
          </div>
          <!-- section title start -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="testimonial-thumb-wrapper">
            <div class="testimonial-thumb-carousel">
              <div class="testimonial-thumb">
                <img src="assets/img/testimonial/testimonial-1.png" alt="testimonial-thumb">
              </div>
              <div class="testimonial-thumb">
                <img src="assets/img/testimonial/testimonial-2.png" alt="testimonial-thumb">
              </div>
              <div class="testimonial-thumb">
                <img src="assets/img/testimonial/testimonial-3.png" alt="testimonial-thumb">
              </div>
              <div class="testimonial-thumb">
                <img src="assets/img/testimonial/testimonial-2.png" alt="testimonial-thumb">
              </div>
            </div>
          </div>
          <div class="testimonial-content-wrapper">
            <div class="testimonial-content-carousel">
              <div class="testimonial-content">
                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                <div class="ratings">
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                </div>
                <h5 class="testimonial-author">lindsy niloms</h5>
              </div>
              <div class="testimonial-content">
                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                <div class="ratings">
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                </div>
                <h5 class="testimonial-author">Daisy Millan</h5>
              </div>
              <div class="testimonial-content">
                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                <div class="ratings">
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                </div>
                <h5 class="testimonial-author">Anamika lusy</h5>
              </div>
              <div class="testimonial-content">
                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                <div class="ratings">
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                  <span><i class="fa fa-star-o"></i></span>
                </div>
                <h5 class="testimonial-author">Maria Mora</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- testimonial area end -->

  <!-- group product start -->
  <section class="group-product-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="group-product-banner">
            <figure class="banner-statistics">
              <a href="#">
                <img src="assets/img/banner/img-bottom-banner.jpg" alt="product banner">
              </a>
              <div class="banner-content banner-content_style3 text-center">
                <h6 class="banner-text1">BEAUTIFUL</h6>
                <h2 class="banner-text2">Wedding Rings</h2>
                <a href="shop.html" class="btn btn-text">Shop Now</a>
              </div>
            </figure>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="categories-group-wrapper">
            <!-- section title start -->
            <div class="section-title-append">
              <h4>best seller product</h4>
              <div class="slick-append"></div>
            </div>
            <!-- section title start -->

            <!-- group list carousel start -->
            <div class="group-list-item-wrapper">
              <div class="group-list-carousel">
                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-1.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Diamond Exclusive ring</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$50.00</span>
                        <span class="price-old"><del>$29.99</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-3.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Handmade Golden ring</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$55.00</span>
                        <span class="price-old"><del>$30.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-5.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          exclusive gold Jewelry</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$45.00</span>
                        <span class="price-old"><del>$25.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-7.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Perfect Diamond earring</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$50.00</span>
                        <span class="price-old"><del>$29.99</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-9.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Handmade Golden Necklace</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$90.00</span>
                        <span class="price-old"><del>$100.</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-11.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Handmade Golden Necklace</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$20.00</span>
                        <span class="price-old"><del>$30.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-13.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Handmade Golden ring</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$55.00</span>
                        <span class="price-old"><del>$30.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-15.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          exclusive gold Jewelry</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$45.00</span>
                        <span class="price-old"><del>$25.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->
              </div>
            </div>
            <!-- group list carousel start -->
          </div>
        </div>
        <div class="col-lg-3">
          <div class="categories-group-wrapper">
            <!-- section title start -->
            <div class="section-title-append">
              <h4>on-sale product</h4>
              <div class="slick-append"></div>
            </div>
            <!-- section title start -->

            <!-- group list carousel start -->
            <div class="group-list-item-wrapper">
              <div class="group-list-carousel">
                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-17.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Handmade Golden Necklace</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$50.00</span>
                        <span class="price-old"><del>$29.99</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-16.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Handmade Golden Necklaces</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$55.00</span>
                        <span class="price-old"><del>$30.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-12.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          exclusive silver top bracellet</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$45.00</span>
                        <span class="price-old"><del>$25.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-11.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          top Perfect Diamond necklace</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$50.00</span>
                        <span class="price-old"><del>$29.99</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-7.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Diamond Exclusive earrings</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$90.00</span>
                        <span class="price-old"><del>$100.</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-2.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          corano top exclusive jewellry</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$20.00</span>
                        <span class="price-old"><del>$30.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-18.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          Handmade Golden ring</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$55.00</span>
                        <span class="price-old"><del>$30.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->

                <!-- group list item start -->
                <div class="group-slide-item">
                  <div class="group-item">
                    <div class="group-item-thumb">
                      <a href="product-details.html">
                        <img src="assets/img/product/product-14.jpg" alt="">
                      </a>
                    </div>
                    <div class="group-item-desc">
                      <h5 class="group-product-name"><a href="product-details.html">
                          exclusive gold Jewelry</a></h5>
                      <div class="price-box">
                        <span class="price-regular">$45.00</span>
                        <span class="price-old"><del>$25.00</del></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- group list item end -->
              </div>
            </div>
            <!-- group list carousel start -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- group product end -->

  <!-- latest blog area start -->
  <section class="latest-blog-area section-padding pt-0">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- section title start -->
          <div class="section-title text-center">
            <h2 class="title">latest blogs</h2>
            <p class="sub-title">There are latest blog posts</p>
          </div>
          <!-- section title start -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="blog-carousel-active slick-row-10 slick-arrow-style">
            <!-- blog post item start -->
            <div class="blog-post-item">
              <figure class="blog-thumb">
                <a href="blog-details.html">
                  <img src="assets/img/blog/blog-img1.jpg" alt="blog image">
                </a>
              </figure>
              <div class="blog-content">
                <div class="blog-meta">
                  <p>25/03/2019 | <a href="#">Corano</a></p>
                </div>
                <h5 class="blog-title">
                  <a href="blog-details.html">Celebrity Daughter Opens Up About Having Her Eye Color Changed</a>
                </h5>
              </div>
            </div>
            <!-- blog post item end -->

            <!-- blog post item start -->
            <div class="blog-post-item">
              <figure class="blog-thumb">
                <a href="blog-details.html">
                  <img src="assets/img/blog/blog-img2.jpg" alt="blog image">
                </a>
              </figure>
              <div class="blog-content">
                <div class="blog-meta">
                  <p>25/03/2019 | <a href="#">Corano</a></p>
                </div>
                <h5 class="blog-title">
                  <a href="blog-details.html">Children Left Home Alone For 4 Days In TV series Experiment</a>
                </h5>
              </div>
            </div>
            <!-- blog post item end -->

            <!-- blog post item start -->
            <div class="blog-post-item">
              <figure class="blog-thumb">
                <a href="blog-details.html">
                  <img src="assets/img/blog/blog-img3.jpg" alt="blog image">
                </a>
              </figure>
              <div class="blog-content">
                <div class="blog-meta">
                  <p>25/03/2019 | <a href="#">Corano</a></p>
                </div>
                <h5 class="blog-title">
                  <a href="blog-details.html">Lotto Winner Offering Up Money To Any Man That Will Date Her</a>
                </h5>
              </div>
            </div>
            <!-- blog post item end -->

            <!-- blog post item start -->
            <div class="blog-post-item">
              <figure class="blog-thumb">
                <a href="blog-details.html">
                  <img src="assets/img/blog/blog-img4.jpg" alt="blog image">
                </a>
              </figure>
              <div class="blog-content">
                <div class="blog-meta">
                  <p>25/03/2019 | <a href="#">Corano</a></p>
                </div>
                <h5 class="blog-title">
                  <a href="blog-details.html">People are Willing Lie When Comes Money, According to Research</a>
                </h5>
              </div>
            </div>
            <!-- blog post item end -->

            <!-- blog post item start -->
            <div class="blog-post-item">
              <figure class="blog-thumb">
                <a href="blog-details.html">
                  <img src="assets/img/blog/blog-img5.jpg" alt="blog image">
                </a>
              </figure>
              <div class="blog-content">
                <div class="blog-meta">
                  <p>25/03/2019 | <a href="#">Corano</a></p>
                </div>
                <h5 class="blog-title">
                  <a href="blog-details.html">romantic Love Stories Of Hollywoodâ€™s Biggest Celebrities</a>
                </h5>
              </div>
            </div>
            <!-- blog post item end -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- latest blog area end -->

  <!-- brand logo area start -->
  <div class="brand-logo section-padding pt-0">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
            <!-- single brand start -->
            <div class="brand-item">
              <a href="#">
                <img src="assets/img/brand/1.png" alt="">
              </a>
            </div>
            <!-- single brand end -->

            <!-- single brand start -->
            <div class="brand-item">
              <a href="#">
                <img src="assets/img/brand/2.png" alt="">
              </a>
            </div>
            <!-- single brand end -->

            <!-- single brand start -->
            <div class="brand-item">
              <a href="#">
                <img src="assets/img/brand/3.png" alt="">
              </a>
            </div>
            <!-- single brand end -->

            <!-- single brand start -->
            <div class="brand-item">
              <a href="#">
                <img src="assets/img/brand/4.png" alt="">
              </a>
            </div>
            <!-- single brand end -->

            <!-- single brand start -->
            <div class="brand-item">
              <a href="#">
                <img src="assets/img/brand/5.png" alt="">
              </a>
            </div>
            <!-- single brand end -->

            <!-- single brand start -->
            <div class="brand-item">
              <a href="#">
                <img src="assets/img/brand/6.png" alt="">
              </a>
            </div>
            <!-- single brand end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- brand logo area end -->
</main>
<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php'; ?>
<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php'; ?>