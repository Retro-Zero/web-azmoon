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
                <a href="#" class="menu-link">خانه</a>
                <a href="#" class="menu-link">درباره ما</a>
                <a href="#" class="menu-link">تماس با ما</a>
                <a href="#" class="menu-link">شعب</a>
                <a href="#" class="menu-link">کاتالوگ</a>
                <a href="../auth/login.php" class="menu-link">ورود</a>
            </ul>
        </nav>

        <p>کاربر گرامی آرین خوش آمدید</p>
    </header>

    <form action="<?= url('web-azmoon/product-store') ?>" method="post" class="create">
        <input type="text" placeholder="عنوان رنگ" name="title">
        <input type="number" placeholder="کد محصول" name="code">
        <input type="number" placeholder="قیمت" name="price">
        <input type="number" placeholder="تعداد در انبار" name="stock">
        <input type="text" placeholder="کد HEX قابل نمایش" name="hex_code">
        <input type="submit" value="ایجاد">
    </form>
</body>

<<?= asset('web-azmoon/public/js/script.js') ?>"></script>
</html>