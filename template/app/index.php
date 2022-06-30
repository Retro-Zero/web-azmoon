<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>هفت رنگ</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link rel="stylesheet" href="<?= asset('web-azmoon/public/css/style.css') ?>" />
  </head>
  <body>
    <header>
      <h1>فروشگاه رنگ ساختمانی هفت‌رنگ</h1>
      <nav>
        <ul class="menu">
          <a href="#" class="menu-link">خانه</a>
          <a href="#" class="menu-link">درباره ما</a>
          <a href="#" class="menu-link">تماس با ما</a>
          <a href="#" class="menu-link">شعب</a>
          <a href="#" class="menu-link">کاتالوگ</a>
          <a href="../auth/login.html" class="menu-link">ورود</a>
        </ul>
        <div class="cart">
          <span class="cart-number" id="cart-counter">0</span>
          <i class="fa fa-shopping-cart cart-icon"></i>
        </div>
      </nav>
    </header>

    <div class="body">
      <i class="fa fa-bars menu-icon" id="menu-icon" onclick="openNavbar()"></i>
      <div class="sidebar" id="sidebar">
        <form action="<?= url('web-azmoon/check-login') ?>" method="post" class="home-login">
          <h1>ورود به پنل شخصی</h1>
          <input type="text" placeholder="نام کاربری" required name="username"/>
          <input type="password" placeholder="رمز عبور" required name="password"/>
          <div class="radio-button">
            <input type="radio" name="level" id="manager" />
            <label for="level">مدیر</label>
          </div>
          <div class="radio-button">
            <input type="radio" name="level" id="seller" />
            <label for="level">شعب</label>
          </div>
          <div class="radio-button">
            <input type="radio" name="level" id="client" />
            <label for="level">خریدار</label>
          </div>
          <input type="submit" value="ورود" />
        </form>

        <div class="coupon">
          <p>تخفیف امروز :</p>
          <div class="coupon-code">
            <p>
                #2A9D8F
                <br />
              10 درصد
            </p>
          </div>
        </div>
      </div>

      <section class="main">
        <h3>محصولات منتخب</h3>
        <div class="products">
            <?php foreach ($products as $product) { ?>
          <div class="product">
            <div class="title" style="background-color: <?= $product['hex_code'] ?>"><?= $product['hex_code'] ?></div>
            <p class="status">وضعیت : <span class="<?= $product['status'] ?>">موجود</span></p>
            <p class="price"><?= $product['price'] ?> </p>
            <p class="add-to-cart" onclick="addToCart()">
              <i class="fa fa-plus"></i>افزودن به سبد خرید
            </p>
          </div>
            <?php } ?>
        </div>
      </section>
    </div>

    <footer>
      <p>
        با خرید اینترنتی از فروشگاه هفت رنگ خریدی مطمئن و راحت را تجربه کنید
      </p>
      <p>شناسه ما در شبکه‌های اجتماعی @haftrang</p>
    </footer>
  </body>

  <script src="<?= asset('web-azmoon/public/js/script.js') ?>"></script>
</html>
