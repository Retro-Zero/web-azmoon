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
            <?php if (isset($_SESSION['user'])) { ?>
                <a href="<?= url('web-azmoon/admin-panel') ?>" class="menu-link">پروفایل</a>
                <a href="<?= url('web-azmoon/logout') ?>" class="menu-link">خروج</a>
            <?php } else { ?>
                <a href="<?= url('web-azmoon/login') ?>" class="menu-link">ورود</a>
            <?php } ?>
        </ul>
        <div class="cart">
            <span class="cart-number" id="cart-counter">0</span>
            <i class="fa fa-shopping-cart cart-icon"></i>
        </div>
    </nav>
</header>

  <form action="<?= url('web-azmoon/check-login') ?>" method="post" class="login">
    <input type="text" name="username" placeholder="نام کاربری" required />
    <input type="password" name="password" placeholder="رمز عبور" required />
    <div class="radio-button">
      <input type="radio" name="level" id="manager" />
      <label for="manager">مدیر</label>
    </div>
    <div class="radio-button">
      <input type="radio" name="level" id="seller" />
      <label for="seller">شعب</label>
    </div>
    <div class="radio-button">
      <input type="radio" name="level" id="client" />
      <label for="client">خریدار</label>
    </div>
    <p class="forgot-password">فراموشی رمز عبور</p>
      <input type="submit" value="ورود">
  </form>
</body>
<script src="<?= asset('web-azmoon/public/js/script.js') ?>"></script>

</html>