<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TINDACO - Giới Thiệu</title>
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
        if(isset($_GET["search"])) {
            $search = $_GET["search"];
        $sql_count = "SELECT COUNT(*) AS total_rows
        FROM products
        INNER JOIN brands ON products.brandId = brands.brandId
        WHERE products.productName LIKE '%$search%' OR brands.brandName LIKE '%$search%'";
        $kt_count = sqlsrv_query($conn , $sql_count);
    ?>
    <div class="show-product grid">
            <div class="category-product">
                <div class="category-product-wrap">
                    <a href="#" class="category-product-title">
                        <?php 
                            if ($kt_count !== false) {
                                $row = sqlsrv_fetch_array($kt_count, SQLSRV_FETCH_ASSOC);
                                $total_rows = $row['total_rows'];
                                echo "KẾT QUẢ TÌM KIẾM TAI NGHE THEO TỪ KHOÁ 
                                [ <span style='color:#f13333;text-transform: uppercase; '>".$search."</span> ] CÓ 
                                <span style='color: #f13333;'>". $total_rows ."</span> KẾT QUẢ";
                            } else {
                                echo "Đã xảy ra lỗi trong truy vấn SQL.";
                            }
                        ?>
                    </a>
                </div>
            </div>
            <div class="home-product">
                <div class="grid__row">
                    <?php  
                        $sql_search = "SELECT products.*, brands.*
                        FROM products
                        INNER JOIN brands ON products.brandId = brands.brandId
                        WHERE products.productName LIKE '%$search%' OR brands.brandName LIKE '%$search%'";
                        $kt_search = sqlsrv_query($conn , $sql_search);                                              
                            if($kt_search !== false) {
                                $sql_product = "SELECT products.* , depot.* 
                                    FROM products 
                                    INNER JOIN depot ON products.productId = depot.productId";
                                    $kt_product = sqlsrv_query($conn , $sql_product);
                                    $row_product = sqlsrv_fetch_array($kt_product, SQLSRV_FETCH_ASSOC);
                                while($row = sqlsrv_fetch_array($kt_search , SQLSRV_FETCH_ASSOC)) {
                                    $productDiscount = $row_product["productDiscountPrice"];
                                    $installment = ($productDiscount >= 10) ? "Trả góp 0 %" : "";
                                    echo "<div class='grid__column-2-4'>";
                                    echo "<a href='' class='home-product-item'>";
                                        echo "<div class='home-product-item__img' 
                                            style='background-image: url(./" . $row["productImgThumbnail"] . ");'>
                                        </div>"; 
                                        echo "
                                        <h4 class='home-product-item__name'>
                                            ". $row["productName"] ."
                                        </h4>
                                        "; 
                                        echo "
                                        <div class='home-product-item__price'>
                                            <div class='home-product-item__price-current'>
                                                ". $row_product["depotOutputPrice"] ." đ
                                            </div>
                                            <div class='home-product-item-price-old'>
                                                ". $row_product["depotInputPrice"] ." đ
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
                                                    Giảm ". $row_product["productDiscountPrice"] . "%
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
                            } else {
                                echo "
                                <script>
                                    alert('Không có kết quả tìm kiếm !!!');
                                    window.location.href = 'user/indexUser.php';
                                </script>";
                            }
                        }
                        sqlsrv_close($conn);
                    ?>
                </div>
            </div>
    </div>
</div>
    <?php include("includes/footer.php"); ?>
</body>
</html>