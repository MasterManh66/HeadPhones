<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="icon" href="./assets/image/Logo YTB US.png">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.5.1/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/base.css">
</head>

<body>
    <!-- Header -->
    <?php include("includes/header.php"); ?>
    <!-- body -->
    <div class="container">
        <div class="container__content">
            <div class="top-navbar">
                <a href="index.php">
                    <i class="top-navbar-icon fa-solid fa-arrow-left"></i>
                </a>
                <div class="top-navbar__tittle"></div>
            </div>
            <div class="content-img">
                <img src="./assets/image/menber-auth.png" alt="" class="content-img-item">
                <h1 class="content-img-text">
                    Đăng ký tài khoản Member
                </h1>
            </div>
            <div class="content-from">
                <form class="form" action="./config/registerProcess.php" method="post">
                    <div class="form-group">
                        <label for="Tài Khoản">Username</label>
                        <label style="color: red"> * </label> <br>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Nhập Tài Khoản" required>
                    </div>
                    <div class="form-group">
                        <label for="Mật Khẩu">Password</label>
                        <label style="color: red"> * </label><br>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Nhập Mật Khẩu" required>
                    </div>
                    <div class="form-group">
                        <label for="Họ Tên">Họ Tên</label>
                        <label style="color: red"> * </label><br>
                        <input type="text" name="cusname" id="cusname" class="form-control" placeholder="Nhập Họ Tên"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="Số Điện Thoại">Số điện thoại</label>
                        <label style="color: red"> * </label><br>
                        <input type="text" name="cusphone" id="cusphone" class="form-control"
                            placeholder="Nhập Số Điện Thoại" required>
                    </div>
                    <div class="form-group">
                        <label for="Địa Chỉ">Địa chỉ</label>
                        <label style="color: red"> * </label><br>
                        <input type="text" name="cusaddress" id="cusaddress" class="form-control"
                            placeholder="Nhập Địa Chỉ" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label><br>
                        <input type="email" name="cusemail" id="cusemail" class="form-control" placeholder="Nhập Email">
                    </div>
                    <div class="form-group btn-agile" style="text-align: center;">
                        <input type="submit" name="submit" class="btn btn-primary btn-md" value="Đăng Ký">
                    </div>

                    <hr>
                    <div class="form-group-footer">
                        <span class="question__text">Bạn đã có tài khoản ?</span>
                        <a class="button-go__login" href="login.php">Đăng nhập ngay</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>