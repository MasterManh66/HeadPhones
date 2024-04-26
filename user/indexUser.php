<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TINDACO - HeadPhones</title>
    <link rel="icon" href="../assets/image/Logo YTB US.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.5.1/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/js/style.js">
</head>

<body>
    <?php 
        session_start();
        include("../config/connect.php");
        include("../config/headerConnect.php");
    ?>
    

        <?php 
            include("../config/bannerConnect.php");
        ?>
            
            <div class="home-product">
                <div class="grid__row">
                    <!-- product item -->
                    <?php
                    $sql_product = "SELECT products.* , depot.* 
                    FROM products 
                    INNER JOIN depot ON products.productId = depot.productId";
                    $kt_product = sqlsrv_query($conn , $sql_product);
                    if ($kt_product !== false) {
                        while($row = sqlsrv_fetch_array($kt_product, SQLSRV_FETCH_ASSOC)) {
                            $productDiscount = $row["productDiscountPrice"];
                            $installment = ($productDiscount >= 10) ? "Trả góp 0 %" : "";
                            if ($productDiscount > 30) {
                                echo "<div class='grid__column-2-4'>";
                                    echo "<a href='../product_detail.php?productId=" . $row["productId"] . "' class='home-product-item'>";
                                        echo "<div class='home-product-item__img' 
                                            style='background-image: url(../" . $row["productImgThumbnail"] . ");'>
                                        </div>"; 
                                        echo "
                                        <h4 class='home-product-item__name'>
                                            ". $row["productName"] ."
                                        </h4>
                                        "; 
                                        echo "
                                        <div class='home-product-item__price'>
                                            <div class='home-product-item__price-current'>
                                                ". $row["depotOutputPrice"] ." đ
                                            </div>
                                            <div class='home-product-item-price-old'>
                                                ". $row["depotInputPrice"] ." đ
                                            </div>
                                        </div>
                                        ";  
                                        echo "<div class='home-product-item__action'>";
                                            echo "<div class='home-product-item__rating'>";
                                            echo "
                                            <div class='home-product-item__star'>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            </div>
                                            <div class='home-product-item__love'>
                                                <span class='home-product-item-name__icon'>
                                                    Yêu thích
                                                </span>
                                                <span class='home-product-item__heart home-product-item__hearted'>
                                                    <i class='home-product-item__heart-icon-empty fa-regular fa-heart' onclick='toggleHeart()'></i>
                                                    <i class='home-product-item__heart-icon-fill fa-solid fa-heart' onclick='toggleHeart()'></i>
                                                </span>
                                            </div>
                                                ";                      
                                            echo "</div>";
                                            echo "
                                            <div class='home-product-item__discount'>
                                                <span class='home-product-item__discount-detail'>
                                                    Giảm ". $row["productDiscountPrice"] . "%
                                                </span>
                                            </div>
                                            <div class='home-product-item__install'>
                                                " . $installment ."
                                            </div>
                                            ";
                                        echo "</div>";
                                    echo "</a>";
                                echo "</div>"; 
                            }
                        }
                    } else {
                        echo "Không có sản phẩm nào";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="show-product grid">
            <div class="category-product">
                <div class="category-product-wrap">
                    <a href="#" class="category-product-title">
                        TAI NGHE
                    </a>
                    <div class="product-brand-list">
                        <a href="#" class="product-brand-item">
                            Tai nghe Bluetooth
                        </a>
                    </div>
                </div>
            </div>
            <div class="home-product">
                <div class="grid__row">
                    <!-- product item -->
                    <?php
                    $sql_product = "SELECT products.* , depot.* 
                    FROM products 
                    INNER JOIN depot ON products.productId = depot.productId";
                    $kt_product = sqlsrv_query($conn , $sql_product);
                    if ($kt_product !== false) {
                        while($row = sqlsrv_fetch_array($kt_product, SQLSRV_FETCH_ASSOC)) {
                            $productDiscount = $row["productDiscountPrice"];
                            $productType = $row["productType"];
                            $installment = ($productDiscount >= 10) ? "Trả góp 0 %" : "";
                            if ($productType === "Tai Nghe Bluetooth") {
                                echo "<div class='grid__column-2-4'>";
                                    echo "<a href='../product_detail.php?productId=" . $row["productId"] . "' class='home-product-item'>";
                                        echo "<div class='home-product-item__img' 
                                            style='background-image: url(../" . $row["productImgThumbnail"] . ");'>
                                        </div>"; 
                                        echo "
                                        <h4 class='home-product-item__name'>
                                            ". $row["productName"] ."
                                        </h4>
                                        "; 
                                        echo "
                                        <div class='home-product-item__price'>
                                            <div class='home-product-item__price-current'>
                                                ". $row["depotOutputPrice"] ." đ
                                            </div>
                                            <div class='home-product-item-price-old'>
                                                ". $row["depotInputPrice"] ." đ
                                            </div>
                                        </div>
                                        ";  
                                        echo "<div class='home-product-item__action'>";
                                            echo "<div class='home-product-item__rating'>";
                                            echo "
                                            <div class='home-product-item__star'>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            </div>
                                            <div class='home-product-item__love'>
                                                <span class='home-product-item-name__icon'>
                                                    Yêu thích
                                                </span>
                                                <span class='home-product-item__heart home-product-item__hearted'>
                                                    <i class='home-product-item__heart-icon-empty fa-regular fa-heart' onclick='toggleHeart()'></i>
                                                    <i class='home-product-item__heart-icon-fill fa-solid fa-heart' onclick='toggleHeart()'></i>
                                                </span>
                                            </div>
                                                ";                      
                                            echo "</div>";
                                            echo "
                                            <div class='home-product-item__discount'>
                                                <span class='home-product-item__discount-detail'>
                                                    Giảm ". $row["productDiscountPrice"] . "%
                                                </span>
                                            </div>
                                            <div class='home-product-item__install'>
                                                " . $installment ."
                                            </div>
                                            ";
                                        echo "</div>";
                                    echo "</a>";
                                echo "</div>"; 
                            }
                        }
                    } else {
                        echo "Không có sản phẩm nào";
                    }
                    ?>
                </div>
            </div>
            <div class="category-product">
                <div class="category-product-wrap">
                    <a href="#" class="category-product-title">
                        TAI NGHE
                    </a>
                    <div class="product-brand-list">
                        <a href="#" class="product-brand-item">
                            Tai nghe Gaming
                        </a>
                    </div>
                </div>
            </div>
            <div class="home-product">
                <div class="grid__row">
                    <!-- product item -->
                    <?php
                    $sql_product = "SELECT products.* , depot.* 
                    FROM products 
                    INNER JOIN depot ON products.productId = depot.productId";
                    $kt_product = sqlsrv_query($conn , $sql_product);
                    if ($kt_product !== false) {
                        while($row = sqlsrv_fetch_array($kt_product, SQLSRV_FETCH_ASSOC)) {
                            $productDiscount = $row["productDiscountPrice"];
                            $productType = $row["productType"];
                            $installment = ($productDiscount >= 10) ? "Trả góp 0 %" : "";
                            if ($productType === "Tai nghe Gaming") {
                                echo "<div class='grid__column-2-4'>";
                                    echo "<a href='../product_detail.php?productId=" . $row["productId"] . "' class='home-product-item'>";
                                        echo "<div class='home-product-item__img' 
                                            style='background-image: url(../" . $row["productImgThumbnail"] . ");'>
                                        </div>"; 
                                        echo "
                                        <h4 class='home-product-item__name'>
                                            ". $row["productName"] ."
                                        </h4>
                                        "; 
                                        echo "
                                        <div class='home-product-item__price'>
                                            <div class='home-product-item__price-current'>
                                                ". $row["depotOutputPrice"] ." đ
                                            </div>
                                            <div class='home-product-item-price-old'>
                                                ". $row["depotInputPrice"] ." đ
                                            </div>
                                        </div>
                                        ";  
                                        echo "<div class='home-product-item__action'>";
                                            echo "<div class='home-product-item__rating'>";
                                            echo "
                                            <div class='home-product-item__star'>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            <i class='home-product-item__star-gold fa-solid fa-star'></i>
                                            </div>
                                            <div class='home-product-item__love'>
                                                <span class='home-product-item-name__icon'>
                                                    Yêu thích
                                                </span>
                                                <span class='home-product-item__heart home-product-item__hearted'>
                                                    <i class='home-product-item__heart-icon-empty fa-regular fa-heart' onclick='toggleHeart()'></i>
                                                    <i class='home-product-item__heart-icon-fill fa-solid fa-heart' onclick='toggleHeart()'></i>
                                                </span>
                                            </div>
                                                ";                      
                                            echo "</div>";
                                            echo "
                                            <div class='home-product-item__discount'>
                                                <span class='home-product-item__discount-detail'>
                                                    Giảm ". $row["productDiscountPrice"] . "%
                                                </span>
                                            </div>
                                            <div class='home-product-item__install'>
                                                " . $installment ."
                                            </div>
                                            ";
                                        echo "</div>";
                                    echo "</a>";
                                echo "</div>"; 
                            }
                        }
                    } else {
                        echo "Không có sản phẩm nào";
                    }
                    ?>
                </div>
            </div>
        </div>


        <?php 
            include("../config/footerConnect.php");
        ?>
    </div>
</body>

</html>