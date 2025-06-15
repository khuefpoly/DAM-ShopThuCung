<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AZPET - Đăng nhập ADMIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css?v=3.2.0">
  <script data-cfasync="false" nonce="c495383b-6a63-44c2-aab6-3d1710e38816">
    try {
      (function(w, d) {
        ! function(bN, bO, bP, bQ) {
          if (bN.zaraz) console.error("zaraz is loaded twice");
          else {
            bN[bP] = bN[bP] || {};
            bN[bP].executed = [];
            bN.zaraz = {
              deferred: [],
              listeners: []
            };
            bN.zaraz._v = "5857";
            bN.zaraz._n = "c495383b-6a63-44c2-aab6-3d1710e38816";
            bN.zaraz.q = [];
            bN.zaraz._f = function(bR) {
              return async function() {
                var bS = Array.prototype.slice.call(arguments);
                bN.zaraz.q.push({
                  m: bR,
                  a: bS
                })
              }
            };
            for (const bT of ["track", "set", "debug"]) bN.zaraz[bT] = bN.zaraz._f(bT);
            bN.zaraz.init = () => {
              var bU = bO.getElementsByTagName(bQ)[0],
                bV = bO.createElement(bQ),
                bW = bO.getElementsByTagName("title")[0];
              bW && (bN[bP].t = bO.getElementsByTagName("title")[0].text);
              bN[bP].x = Math.random();
              bN[bP].w = bN.screen.width;
              bN[bP].h = bN.screen.height;
              bN[bP].j = bN.innerHeight;
              bN[bP].e = bN.innerWidth;
              bN[bP].l = bN.location.href;
              bN[bP].r = bO.referrer;
              bN[bP].k = bN.screen.colorDepth;
              bN[bP].n = bO.characterSet;
              bN[bP].o = (new Date).getTimezoneOffset();
              if (bN.dataLayer)
                for (const bX of Object.entries(Object.entries(dataLayer).reduce(((bY, bZ) => ({
                    ...bY[1],
                    ...bZ[1]
                  })), {}))) zaraz.set(bX[0], bX[1], {
                  scope: "page"
                });
              bN[bP].q = [];
              for (; bN.zaraz.q.length;) {
                const b$ = bN.zaraz.q.shift();
                bN[bP].q.push(b$)
              }
              bV.defer = !0;
              for (const ca of [localStorage, sessionStorage]) Object.keys(ca || {}).filter((cc => cc.startsWith("_zaraz_"))).forEach((cb => {
                try {
                  bN[bP]["z_" + cb.slice(7)] = JSON.parse(ca.getItem(cb))
                } catch {
                  bN[bP]["z_" + cb.slice(7)] = ca.getItem(cb)
                }
              }));
              bV.referrerPolicy = "origin";
              bV.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bN[bP])));
              bU.parentNode.insertBefore(bV, bU)
            };
            ["complete", "interactive"].includes(bO.readyState) ? zaraz.init() : bN.addEventListener("DOMContentLoaded", zaraz.init)
          }
        }(w, d, "zarazData", "script");
        window.zaraz._p = async cd => new Promise((ce => {
          if (cd) {
            cd.e && cd.e.forEach((cf => {
              try {
                const cg = d.querySelector("script[nonce]"),
                  ch = cg?.nonce || cg?.getAttribute("nonce"),
                  ci = d.createElement("script");
                ch && (ci.nonce = ch);
                ci.innerHTML = cf;
                ci.onload = () => {
                  d.head.removeChild(ci)
                };
                d.head.appendChild(ci)
              } catch (cj) {
                console.error(`Error executing script: ${cf}\n`, cj)
              }
            }));
            Promise.allSettled((cd.f || []).map((ck => fetch(ck[0], ck[1]))))
          }
          ce()
        }));
        zaraz._p({
          "e": ["(function(w,d){})(window,document)"]
        });
      })(window, document)
    } catch (e) {
      throw fetch("/cdn-cgi/zaraz/t"), e;
    };
  </script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="./assets/index2.html"><b>AZ</b>PET</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <?php if (isset($_SESSION['error'])) { ?>
          <span class="text-danger text-center"><?= $_SESSION['error'] ?></span>
        <?php } else { ?>
          <p class="login-box-msg">Vui lòng đăng nhập</p>
        <?php } ?>

        <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="social-auth-links text-center mb-3">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
          </div>
        </form>

        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">Quên mật khẩu</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets/dist/js/adminlte.min.js?v=3.2.0"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"94f8994c9931a082","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.6.2","token":"2437d112162f4ec4b63c3ca0eb38fb20"}' crossorigin="anonymous"></script>
</body>

</html>