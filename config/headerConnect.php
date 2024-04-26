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
                        <a href="../user/indexUser.php">
                            <img class="header__logo-img" src="../assets/image/Logo YTB US.png" alt="">
                        </a>
                    </div>

                    <div class="header__search">
                        <form action="../search_product.php" method="get" class="form_search_header">
                            <div class="header__search-item">
                                <input type="text" name="search" class="header__search-input" placeholder="Bạn cần tìm gì ?">
                                <button type="submit" class="header__btn-search">Tìm kiếm</button>
                            </div>
                            <!-- <i class="header__search-icon fa-solid fa-magnifying-glass"></i> -->
                        </form>
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
                                <?php 
                                    $sql_cus = "SELECT * from customers";
                                    $kt_cus = sqlsrv_query($conn, $sql_cus);
                                    if($kt_cus !== false) {
                                        $row = sqlsrv_fetch_array($kt_cus, SQLSRV_FETCH_ASSOC);
                                        $_SESSION["cusId"] = $row["cusId"] ;
                                    
                                        $cusId = $_SESSION['cusId'];
                                        $sql_cart = "SELECT products.* FROM products 
                                        INNER JOIN cart ON products.productId = cart.productId
                                        WHERE cart.cusId = '$cusId'"; 
                                        $kt_cart = sqlsrv_query($conn , $sql_cart);
                                        if (sqlsrv_has_rows($kt_cart)) {
                                            while ($row = sqlsrv_fetch_array($kt_cart, SQLSRV_FETCH_ASSOC)) {
                                                echo "
                                                <h4 class='header__car-list-heading'>
                                                    Sản phẩm đã thêm
                                                </h4>
                                                ";
                                                echo "
                                                <ul class='header__cart-list-item'>
                                                    <li class='header__cart-item'>
                                                ";
                                                echo "<img src='../". $row["productImgThumbnail"] ."' alt='' class='header__cart-img'>";
                                                echo '<div class="header__cart-list-info">
                                                        <div class="header__cart-item-head">';
                                                echo '<h5 class="header__cart-item-name">' . $row["productName"] . '</h5>';
                                                echo '<div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price-text">
                                                        Giá :
                                                    </span>
                                                    <span class="header__cart-item-price">
                                                        '.$row["depotOutputPrice"].'
                                                    </span>
                                                </div>';
                                                echo '<div class="header__cart-item-body">
                                                        <div class="header__cart-item-qnt-wrap">';
                                                echo '<span class="header__cart-item-name-qnt">
                                                        Số lượng :
                                                    </span>
                                                    <span class="header__cart-item-quantity">
                                                        '.$row["cartQuantity"].'
                                                    </span>';
                                                echo '<span class="header__cart-item-remove">
                                                        Xoá
                                                    </span>';
                                                echo '</div></div></li></ul>';
                                            }
                                        } else {
                                            echo "<img src='../assets/image/no_cart.png' alt='' class='header__cart-list--no-cart  header__cart--no-cart-img'>";
                                        }
                                    }
                                ?>
                                <!-- <ul class="header__cart-list-item">
                                    <li class="header__cart-item">
                                        <img src="../assets/image/1.jpg" alt="" class="header__cart-img">
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
                                </ul>  -->
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
                                                        <a href="../profile/profile.php" class="header__user-link">Tài khoản</a>
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
                                        <a href="../index.php" class="header__user-link">Đăng xuất</a>
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
                                <a href="../user/indexUser.php" class="header__menu-item-name <?php echo isActivePage('indexUser.php'); ?> ">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="header__menu-item">
                                <a href="../user/aboutUser.php" class="header__menu-item-name <?php echo isActivePage('aboutUser.php'); ?>">
                                    Giới thiệu
                                </a>
                            </li>
                            <li class="header__menu-item">
                                <a href="../user/contactUser.php" class="header__menu-item-name <?php echo isActivePage('contactUser.php'); ?>">
                                    Liên hệ
                                </a>
                            </li>
                        </ul>
                        <!-- <i class="header__menu-icon fa-solid fa-mobile-screen-button"></i> -->
                    </div>
                </div>
            </div>
        </header>