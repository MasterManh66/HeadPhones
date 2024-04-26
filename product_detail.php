<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TINDACO - Chi tiết sản phẩm</title>
    <link rel="icon" href="./assets/image/Logo YTB US.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.5.1/fontawesome-free-6.5.1-web/css/all.min.css">
</head>
<body>
    <?php 
        include("includes/header.php");
        if(isset($_GET["productId"])){
            $productId = $_GET["productId"];
            
            $sql_product_click = "SELECT products.*, depot.* 
            FROM products INNER JOIN depot ON products.productId = depot.productId
            WHERE products.productId = '$productId'";
            $kt_product_click = sqlsrv_query($conn , $sql_product_click);

            if($kt_product_click !== false) {
                $row = sqlsrv_fetch_array($kt_product_click, SQLSRV_FETCH_ASSOC);

                echo '<div class="product_details">
                <div class="grid">';
                echo '<div class="product_details-header">';
                echo '<div class="product_details-name">
                    '. $row["productName"].'
                </div>';
                echo '</div>';

                echo '<div class="grid__row">';
                echo '<div class="grid__column-8">
                    <div class="product_body">
                        <img class="product_body-img" src="'.$row["productImgThumbnail"].'" alt="">
                    </div>
                </div>';
                echo '<div class="grid__column-4">
                    <div class="product_body-price">
                        <div class="product_body-price-out">
                            '.$row["depotOutputPrice"].' đ
                        </div>
                        <div class="product_body-price-in">
                            '.$row["depotInputPrice"].' đ
                        </div>
                    </div>
                    <p class="product_Price-header">Màu Sản Phẩm</p>
                        <p class="product_color" style="background-color:' . $row["productColor"] . '">
                    </p>
                    <div class="product__add">
                        <a href="#" class="product__add-link">
                            <button class="product__add-pay" style="button">
                                <span class="product__add-pay-text">Mua Ngay</span>
                            </button>
                        </a>
                        <a href="#" class="product__add-cart">
                            <i class="product__add-cart-icon fa-solid fa-cart-plus"></i>
                            <p class="product__add-cart-text">Thêm vào giỏ</p>
                        </a>
                    </div>
                    <div class="product_body-description" >
                        <p class="product_body-description-head">Đặc điểm nổi bật</p>
                        <span class="product_body-text">'.$row["productDescription"].'</span>
                    </div>
                </div>';

                echo ' </div></div></div>';
            }else {
                echo "Truy vấn không thành công !";
            }
        }
    ?>
    
</div>
    <?php include("includes/footer.php"); ?>
</body>
</html>