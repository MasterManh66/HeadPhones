<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TINDACO - Trang Quản Trị</title>
    <link rel="icon" href="../../assets/image/Logo YTB US.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/font/fontawesome-free-6.5.1/fontawesome-free-6.5.1-web/css/all.min.css">
</head>

<body>
    <?php 
        session_start();
        include("../../config/connect.php");
    ?>
    <div class="main">
        <button onclick="topFunction()" id="myBtn" title="Go to TOP">
            <i class="fa-solid fa-angle-up"></i>
            <span>Lên đầu</span>
        </button>
        <header class="header" id="myHeader">
            <div class="grid">
                <nav class="header__navbar">

                </nav>

                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="#">
                            <img class="header__logo-img" src="../../assets/image/Logo YTB US.png" alt="">
                        </a>
                    </div>

                    <div class="header__search">
                        <input type="text" class="header__search-input" placeholder="Bạn cần tìm gì ?">
                        <i class="header__search-icon fa-solid fa-magnifying-glass"></i>
                    </div>

                    <!-- Cart layout -->
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class="header__cart-icon fa-solid fa-cart-shopping"></i>
                            <span class="header__cart-notice">
                                0
                            </span>
                            <!-- No cart : header__cart-list--no-cart -->
                            <div class="header__cart-list">
                                <img src="../../assets/image/no_cart.png" alt="" class="header__cart--no-cart-img">\

                                <h4 class="header__car-list-heading">
                                    Sản phẩm đã thêm
                                </h4>
                                <ul class="header__cart-list-item">
                                    <li class="header__cart-item">
                                        <img src="../../assets/image/1.jpg" alt="" class="header__cart-img">
                                        <div class="header__cart-list-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">
                                                    Kem
                                                </h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price-text">
                                                        Giá :
                                                    </span>
                                                    <span class="header__cart-item-price">
                                                        3000
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <div class="header__cart-item-qnt-wrap">
                                                    <span class="header__cart-item-name-qnt">
                                                        Số lượng :
                                                    </span>
                                                    <span class="header__cart-item-quantity">
                                                        2
                                                    </span>
                                                </div>
                                                <span class="header__cart-item-remove">
                                                    Xoá
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header__cart-item">
                                        <img src="../../assets/image/1.jpg" alt="" class="header__cart-img">
                                        <div class="header__cart-list-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">
                                                    Kem
                                                </h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price-text">
                                                        Giá :
                                                    </span>
                                                    <span class="header__cart-item-price">
                                                        3000
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <div class="header__cart-item-qnt-wrap">
                                                    <span class="header__cart-item-name-qnt">
                                                        Số lượng :
                                                    </span>
                                                    <span class="header__cart-item-quantity">
                                                        2
                                                    </span>
                                                </div>
                                                <span class="header__cart-item-remove">
                                                    Xoá
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header__cart-item">
                                        <img src="../../assets/image/1.jpg" alt="" class="header__cart-img">
                                        <div class="header__cart-list-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">
                                                    Kem
                                                </h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price-text">
                                                        Giá :
                                                    </span>
                                                    <span class="header__cart-item-price">
                                                        3000
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <div class="header__cart-item-qnt-wrap">
                                                    <span class="header__cart-item-name-qnt">
                                                        Số lượng :
                                                    </span>
                                                    <span class="header__cart-item-quantity">
                                                        2
                                                    </span>
                                                </div>
                                                <span class="header__cart-item-remove">
                                                    Xoá
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="header__user js-form-open">
                        <div class="header__user-wrap">
                            <i class="header__user-icon fa-solid fa-circle-user"></i>
                            <p>
                                <?php
                                    if (isset($_SESSION['accId'])) {
                                        $accId = $_SESSION['accId'];
                                        $roleId = $_SESSION['roleId'];
                                        if ($roleId == 1) {
                                            $sql_admin = "SELECT username FROM accounts WHERE accId = '$accId'";
                                            $kt_admin = sqlsrv_query($conn , $sql_admin);
                                            if ($kt_admin === false) {
                                                die( print_r(sqlsrv_errors(), true));
                                            }
                                            if ($row = sqlsrv_fetch_array($kt_admin, SQLSRV_FETCH_ASSOC)) {
                                                echo $row["username"];
                                            } else {
                                                echo "Không có dữ liệu.";
                                            }
                                        } else if ($roleId == 2) {
                                            $sql_emp = "SELECT empName FROM employee WHERE accId = '$accId'";
                                            $kt_emp = sqlsrv_query($conn , $sql_emp);
                                            if ($kt_emp === false) {
                                                die( print_r(sqlsrv_errors(), true));
                                            }
                                            if ($row = sqlsrv_fetch_array($kt_emp, SQLSRV_FETCH_ASSOC)) {
                                                echo $row["empName"];
                                            } else {
                                                echo "Không có dữ liệu.";
                                            }
                                        } else {
                                            $sql_cus = "SELECT cusName FROM customers WHERE accId = '$accId'";
                                            $kt_cus = sqlsrv_query($conn , $sql_cus);
                                            if ($kt_cus === false) {
                                                die( print_r(sqlsrv_errors(), true));
                                            }
                                            if ($row = sqlsrv_fetch_array($kt_cus, SQLSRV_FETCH_ASSOC)) {
                                                echo $row["cusName"];
                                            } else {
                                                echo "Không có dữ liệu.";
                                            }
                                        }
                                    } else {
                                        echo "Đăng nhập";
                                    }
                                ?>
                            </p>

                            <div class="header__user-list">
                                <ul class="header__user-navbar">
                                    <?php 
                                        if(isset($_SESSION['roleId'])) {
                                            $roleId = $_SESSION['roleId'];

                                            if ($roleId == 2 or $roleId == 3) {
                                                echo '
                                                    <li class="header__user-item">
                                                        <a href="../profile/profile.php" class="header__user-link">Tài khoản</a>
                                                    </li>
                                                ';
                                            }else if ($roleId == 1){
                                                echo '
                                                    <li class="header__user-item">
                                                        <a href="../../profile/profile.php" class="header__user-link">Tài khoản</a>
                                                    </li>
                                                ';
                                            }
                                        }
                                    ?>
                                    <li class="header__user-item">
                                        <a href="" class="header__user-link">Đơn mua</a>
                                    </li>
                                    <?php 
                                        if (isset($_SESSION['roleId'])) {
                                            $roleId = $_SESSION['roleId'];

                                            if ($roleId == 1 ) {
                                                echo '
                                                    <li class="header__user-item">
                                                        <a href="../admin/pages/adminControl.php" class="header__user-link">Trang quản trị</a>
                                                    </li>
                                                ';
                                            }
                                            else if ($roleId == 2) {
                                                echo '
                                                    <li class="header__user-item">
                                                        <a href="" class="header__user-link">Quản trị viên</a>
                                                    </li>
                                                ';
                                            }
                                        }
                                    ?>
                                    <li class="header__user-item">
                                        <a href="../../index.php" class="header__user-link">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <?php function isActivePage($pageName) {
                    return basename($_SERVER['PHP_SELF']) === $pageName ? 'header_active' : '';
                }
                ?>
                <div class="header__menu">
                    <div class="header__menu-wrap">
                        <ul class="header__menu-list">
                            <li class="header__menu-item">
                                <a href="../admin.php" class="header__menu-item-name <?php echo isActivePage('indexUser.php'); ?> ">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="header__menu-item">
                                <a href="../../user/aboutUser.php" class="header__menu-item-name <?php echo isActivePage('aboutUser.php'); ?> ">
                                    Giới thiệu
                                </a>
                            </li>
                            <li class="header__menu-item">
                                <a href="../../user/contactUser.php" class="header__menu-item-name <?php echo isActivePage('contactUser.php'); ?>">
                                    Liên hệ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

    <div class="profile">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__column-3">
                    <div class="profile__navbar">
                        <div class="profile__navbar-wrap">
                            <div class="profile__navbar-header">
                                <div class="profile__navbar-info">
                                    <i class="profile__navbar-info-icon fa-solid fa-circle-user"></i>
                                    <div class="profile__navbar-info-wrap">
                                        <div class="profile__navbar-info-head">
                                            <?php 
                                                if(isset($_SESSION['username'])) {
                                                    $username = $_SESSION['username'];
                                                    echo $username ;
                                                }else {
                                                    echo "username";
                                                }
                                            ?>
                                        </div>
                                        <a href="adminControl.php" class="profile__navbar-info-body">
                                            <i class="profile__navbar-info-body-icon fa-solid fa-toolbox"></i>
                                            <h4 class="profile__navbar-info-body-name">
                                                Trang Quản Trị
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php function ActiveAdmin($pageName) {
                                return basename($_SERVER['PHP_SELF']) === $pageName ? 'profile_active' : '';
                            }
                            ?>
                            <div class="profile__navbar-list">
                                <div class="profile__navbar-item">
                                    <div class="profile__navbar-item-wrap">
                                        <div class="profile__navbar-item__user">
                                            <i class="profile__navbar-item-icon__user fa-regular fa-address-card"></i>
                                            <div class="profile__navbar-item-name">
                                                Quản lý tài khoản
                                            </div>
                                        </div>

                                        <!-- add class profile_active -->

                                        <div class="profile__user-list">
                                            <a class="profile__user-link" href="list_account.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('list_account.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Danh sách tài khoản
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__navbar-item">
                                    <div class="profile__navbar-item-wrap">
                                        <div class="profile__navbar-item__user">
                                            <i class="profile__navbar-item-icon__product fa-regular fa-clipboard"></i>
                                            <div class="profile__navbar-item-name">
                                                Quản lý sản phẩm
                                            </div>
                                        </div>
                                        <div class="profile__user-list">
                                            <a class="profile__user-link" href="list_product.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('list_product.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Danh sách sản phẩm
                                                    </h4>
                                                </div>
                                            </a>
                                            <a class="profile__user-link" href="insert_product.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('insert_product.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Thêm sản phẩm
                                                    </h4>
                                                </div>
                                            </a>
                                            <a class="profile__user-link" href="list_depot.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('list_depot.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Kho chứa sản phẩm
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__navbar-item">
                                    <div class="profile__navbar-item-wrap">
                                        <div class="profile__navbar-item__user">
                                            <i class="profile__navbar-item-icon__order fa-solid fa-cart-plus"></i>
                                            <div class="profile__navbar-item-name">
                                                Quản lý Order
                                            </div>
                                        </div>
                                        <div class="profile__user-list">
                                            <a class="profile__user-link" href="list_order.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('list_order.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Danh sách order
                                                    </h4>
                                                </div>
                                            </a>
                                            <a class="profile__user-link" href="confirm_order.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('confirm_order.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Xác nhận Order
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__navbar-item">
                                    <div class="profile__navbar-item-wrap">
                                        <div class="profile__navbar-item__user">
                                            <i class="profile__navbar-item-icon__bell fa-solid fa-building-user"></i>
                                            <div class="profile__navbar-item-name">
                                                Quản lý Brand
                                            </div>
                                        </div>
                                        <div class="profile__user-list">
                                            <a class="profile__user-link" href="list_brand.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('list_brand.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Danh sách thương hiệu
                                                    </h4>
                                                </div>
                                            </a>
                                            <a class="profile__user-link" href="change_brand.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('change_brand.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Thêm thương hiệu
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__navbar-item">
                                    <div class="profile__navbar-item-wrap">
                                        <div class="profile__navbar-item__user">
                                            <i class="profile__navbar-item-icon__order fa-solid fa-list"></i>
                                            <div class="profile__navbar-item-name">
                                                Quản lý Danh mục
                                            </div>
                                        </div>
                                        <div class="profile__user-list">
                                            <a class="profile__user-link" href="list_category.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('list_category.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Danh sách danh mục
                                                    </h4>
                                                </div>
                                            </a>
                                            <a class="profile__user-link" href="add_category.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('add_category.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Thêm danh mục
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__navbar-item">
                                    <div class="profile__navbar-item-wrap">
                                        <div class="profile__navbar-item__user">
                                            <i class="profile__navbar-item-icon__user fa-solid fa-chart-column"></i>
                                            <div class="profile__navbar-item-name">
                                                Quản lý Doanh thu
                                            </div>
                                        </div>
                                        <div class="profile__user-list">
                                            <a class="profile__user-link" href="revenue_statistics.php">
                                                <div class="profile__user-item <?php echo ActiveAdmin('revenue_statistics.php'); ?>">
                                                    <h4 class="profile__user-name">
                                                        Xem doanh thu
                                                    </h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid__column-9">
                    <div class="profile__view">
                        <div class="profile__view-wrap">
                            <div class="profile__view-head">
                                <div class="profile__view-title">
                                    Trang Quản Trị
                                </div>
                                <div class="profile__view-name">
                                    Quản lý tất cả thông tin của Website dành cho Admin
                                </div>
                            </div>
                            <div class="profile__view-body">