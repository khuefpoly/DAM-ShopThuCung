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
                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Liên hệ </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb area end -->

  <!-- google map start -->
  <div class="map-area section-padding">
    <div id="google-map"></div>
  </div>
  <!-- google map end -->

  <!-- contact area start -->
  <div class="contact-area section-padding pt-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="contact-message">
            <h4 class="contact-title">Biểu mẫu liên hệ</h4>
            <form id="contact-form" action="https://whizthemes.com/mail-php/genger/mail.php" method="post" class="contact-form">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input name="first_name" placeholder="Name *" type="text" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input name="phone" placeholder="Phone *" type="text" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input name="email_address" placeholder="Email *" type="text" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input name="contact_subject" placeholder="Subject *" type="text">
                </div>
                <div class="col-12">
                  <div class="contact2-textarea text-center">
                    <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                  </div>
                  <div class="contact-btn">
                    <button class="btn btn-sqr" type="submit">Gửi</button>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <p class="form-messege"></p>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-info">
            <h4 class="contact-title">Liên hệ với chúng tôi</h4>
            <ul>
              <li><i class="fa fa-fax"></i> Địa chỉ : Số 9 Trịnh Văn Bô</li>
              <li><i class="fa fa-phone"></i> Email: matpetfamily@gmail.com</li>
              <li><i class="fa fa-envelope-o"></i> (012) 800 456 789-987</li>
            </ul>
            <div class="working-time">
              <h6>Thời gian làm việc</h6>
              <p><span>Thứ 2 – Thứ 7:</span>8h – 22h</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- contact area end -->
</main>

<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php'; ?>
<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php'; ?>