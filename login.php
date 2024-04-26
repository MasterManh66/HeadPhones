<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
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
                <img src="./assets/image/logo_login.png" alt="" class="content-img-item">
                <h1 class="content-img-text">
                    Đăng nhập tài khoản Member
                </h1>
            </div>
            <div class="content-from">
                <form class="form" action="./config/loginProcess.php" method="post">
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
                    <div class="form-group btn-agile" style="text-align: center;">
                        <input type="submit" name="submit" class="btn btn-primary btn-md" value="Đăng Nhập">
                    </div>

                    <hr>
                    <div class="form-group-footer">
                        <span class="question__text">Bạn chưa có tài khoản ?</span>
                        <a class="button-go__login" href="register.php">Đăng ký ngay</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>