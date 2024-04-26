<?php 
        session_start();
        include("config/connect.php");
?>
    <div class="main" >
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
                        <a href="index.php">
                            <img class="header__logo-img" src="./assets/image/Logo YTB US.png" alt="">
                        </a>
                    </div>
    
                    <div class="header__search">
                        <form action="search_product.php" method="get" class="form_search_header">
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
                                        $sql_cart = "SELECT products.* FROM products 
                                        INNER JOIN cart ON products.productId = cart.productId"; 
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
                                            echo '<img src="assets/image/no_cart.png" alt="" class="header__cart-list--no-cart  header__cart--no-cart-img">';
                                        }
                                ?>
                            </div> 
                        </div>
                    </div>
    
                    <div class="header__user js-form-open">
                        <i class="header__user-icon fa-regular fa-user"></i>
                        <p>
                            Đăng nhập
                        </p>
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
                                <a href="index.php" class="header__menu-item-name <?php echo isActivePage('index.php'); ?>">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="header__menu-item">
                                <a href="about.php" class="header__menu-item-name <?php echo isActivePage('about.php'); ?>">
                                    Giới thiệu
                                </a>
                            </li>
                            <li class="header__menu-item">
                                <a href="contact.php" class="header__menu-item-name <?php echo isActivePage('contact.php'); ?>">
                                    Liên hệ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>