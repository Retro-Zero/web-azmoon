<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>هفت رنگ</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="<?= asset('web-azmoon/public/css/style.css') ?>" />
</head>

<body>
  <header>
    <h1>فروشگاه رنگ ساختمانی هفت‌رنگ</h1>
    <nav>
      <ul class="menu">
        <a href="<?= url('web-azmoon') ?>" class="menu-link">خانه</a>
        <a href="#" class="menu-link">درباره ما</a>
        <a href="#" class="menu-link">تماس با ما</a>
        <a href="#" class="menu-link">شعب</a>
        <a href="#" class="menu-link">کاتالوگ</a>
        <a href="<?= url('web-azmoon/logout') ?>" class="menu-link">خروج</a>
      </ul>
    </nav>

    <p>کاربر گرامی <?= $user['full_name'] ?> خوش آمدید</p>
  </header>
  <a href="<?= url('web-azmoon/create-product') ?>" class="new-row">افزودن محصول جدید</a>
  <table class="dashboard-table">
    <tr>
      <th>#</th>
      <th>عنوان رنگ</th>
      <th>کد رنگ</th>
      <th>قیمت</th>
      <th>امکانات</th>
    </tr>
      <?php
      $counter = 1; foreach ($products as $product) {?>
    <tr>
      <td><?= $counter ?></td>
      <td><?= $product['title'] ?></td>
      <td><?= $product['hex_code'] ?></td>
      <td><?= $product['price'] ?></td>
      <td><a href="<?= url('web-azmoon/product-delete/' . $product['id']) ?>" class="delete"><i
            class="fa fa-trash"></i></a></td>
    </tr>
      <?php $counter++;} ?>
  </table>

</body>
<<?= asset('web-azmoon/public/js/script.js') ?>"></script>

</html>