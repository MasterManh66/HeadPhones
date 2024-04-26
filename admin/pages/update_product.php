<?php 
    session_start();
    include("../../config/connect.php");

    if(isset($_POST["submit"])) {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $productId = $_SESSION["productId"];

            $sql_select = "SELECT products.* , depot.* FROM products 
            INNER JOIN depot ON products.productId = depot.productId
            WHERE products.productId = '$productId'";
            $kt_select = sqlsrv_query($conn , $sql_select);
    
            if ($kt_select !== false) {
                $row = sqlsrv_fetch_array($kt_select , SQLSRV_FETCH_ASSOC);
    
                if (!empty($_FILES["fileUpload"]["name"])) {
                    $target_dir = "../../fileUpload/";
                    $uploadSize = $_FILES["fileUpload"]["size"];
                    $target_file = $target_dir.time()."-".basename($_FILES["fileUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
                    $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
                    if ($check == false ) {
                        echo " File is not an image";
                        $uploadOk = 0;
                    }
    
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp") {
                        echo "Sorry , only JPG, PNG, JPEG , WEBP & GIT files are allowed.";
                        $uploadOk = 0;
                    }
    
                    $preferStringLength = strlen("../../");
                    $subString = substr($target_file, $preferStringLength);
    
                    if($uploadOk == 1 && $uploadSize < 100000) {
                        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                            $productName = !empty($_POST["productName"]) ? $_POST["productName"] : $row["productName"];
                            $productType = !empty($_POST["productType"]) ? $_POST["productType"] : $row["productType"];
                            $productTitle = !empty($_POST["productTitle"]) ? $_POST["productTitle"] : $row["productTitle"];
                            $productDescription = !empty($_POST["productDescription"]) ? $_POST["productDescription"] : $row["productDescription"];
                            $productImgThumbnail = !empty($subString) ? $subString : $row["productImgThumbnail"];
                            $productColor = !empty($_POST["productColor"]) ? $_POST["productColor"] : $row["productColor"];
                            $brandId = !empty($_POST["brandId"]) ? $_POST["brandId"] : $row["brandId"];
    
                            $depotInputPrice = !empty($_POST["depotInputPrice"]) ? $_POST["depotInputPrice"] : $row["depotInputPrice"];
                            $depotOutputPrice = !empty($_POST["depotOutputPrice"]) ? $_POST["depotOutputPrice"] : $row["depotOutputPrice"];
                            $productQuantity = !empty($_POST["productQuantity"]) ? $_POST["productQuantity"] : $row["productQuantity"];

                            $sql_update_product = "UPDATE products
                            SET productName = "."N"."'$productName', productType = '$productType', productTitle = N'$productTitle', productDescription = N'$productDescription',
                            productImgThumbnail = '$productImgThumbnail', productColor = '$productColor', brandId = '$brandId'
                            WHERE products.productId = '$productId'";
                            $kt_update_product = sqlsrv_query($conn, $sql_update_product);
    
                            $sql_update_depot = "UPDATE depot
                            SET depotInputPrice = '$depotInputPrice' , depotOutputPrice = '$depotOutputPrice' , productQuantity = '$productQuantity' 
                            WHERE depot.productId = '$productId'";
                            $kt_update_depot = sqlsrv_query($conn , $sql_update_depot);
    
                            if($kt_update_depot !== false) {
                                $sql_depot_select = "SELECT * FROM depot WHERE depot.productId = '$productId'";
                                $kt_depot_select = sqlsrv_query($conn, $sql_depot_select);
    
                                if ($row_depot = sqlsrv_fetch_array($kt_depot_select, SQLSRV_FETCH_ASSOC)) {
                                    $InputPrice = $row_depot["depotInputPrice"];
                                    $OutputPrice = $row_depot["depotOutputPrice"];
                                    $productDiscountPrice = round((($InputPrice - $OutputPrice) / $InputPrice) * 100);
        
                                    $sql_update_discount = "UPDATE depot
                                    SET productDiscountPrice = '$productDiscountPrice'
                                    WHERE productId = '$productId'";
                                    $kt_update_discount = sqlsrv_query($conn , $sql_update_discount);
        
                                    if($kt_update_discount !== false) {
                                        echo "
                                        <script>
                                            alert('Bạn đã cập nhật sản phẩm thành công !!!');
                                            window.location.href = 'list_product.php';
                                        </script>"; 
                                    }
                                }
                            }
                        }
                    }
                } else {
                    $productName = !empty($_POST["productName"]) ? $_POST["productName"] : $row["productName"];
                    $productType = !empty($_POST["productType"]) ? $_POST["productType"] : $row["productType"];
                    $productTitle = !empty($_POST["productTitle"]) ? $_POST["productTitle"] : $row["productTitle"];
                    $productDescription = !empty($_POST["productDescription"]) ? $_POST["productDescription"] : $row["productDescription"];
                    $productImgThumbnail = !empty($subString) ? $subString : $row["productImgThumbnail"];
                    $productColor = !empty($_POST["productColor"]) ? $_POST["productColor"] : $row["productColor"];
                    $brandId = !empty($_POST["brandId"]) ? $_POST["brandId"] : $row["brandId"];
    
                    $depotInputPrice = !empty($_POST["depotInputPrice"]) ? $_POST["depotInputPrice"] : $row["depotInputPrice"];
                    $depotOutputPrice = !empty($_POST["depotOutputPrice"]) ? $_POST["depotOutputPrice"] : $row["depotOutputPrice"];
                    $productQuantity = !empty($_POST["productQuantity"]) ? $_POST["productQuantity"] : $row["productQuantity"];
    
                    $sql_update_product = "UPDATE products
                    SET productName = "."N"."'$productName', productType = '$productType', productTitle = N'$productTitle', productDescription = N'$productDescription',
                    productImgThumbnail = '$productImgThumbnail', productColor = '$productColor', brandId = '$brandId'
                    WHERE products.productId = '$productId'";
                    $kt_update_product = sqlsrv_query($conn, $sql_update_product);
    
                    $sql_update_depot = "UPDATE depot
                    SET depotInputPrice = '$depotInputPrice' , depotOutputPrice = '$depotOutputPrice' , productQuantity = '$productQuantity' 
                    WHERE depot.productId = '$productId'";
                    $kt_update_depot = sqlsrv_query($conn , $sql_update_depot);
    
                    if($kt_update_depot !== false) {
                        $sql_depot_select = "SELECT * FROM depot WHERE depot.productId = '$productId'";
                        $kt_depot_select = sqlsrv_query($conn, $sql_depot_select);
    
                        if ($row_depot = sqlsrv_fetch_array($kt_depot_select, SQLSRV_FETCH_ASSOC)) {
                            $InputPrice = $row_depot["depotInputPrice"];
                            $OutputPrice = $row_depot["depotOutputPrice"];
                            $productDiscountPrice = round((($InputPrice - $OutputPrice) / $InputPrice) * 100);
    
                            echo var_dump($productDiscountPrice);
    
                            $sql_update_discount = "UPDATE depot
                                SET productDiscountPrice = '$productDiscountPrice'
                                WHERE productId = '$productId'";
                            $kt_update_discount = sqlsrv_query($conn , $sql_update_discount);
    
                            if($kt_update_discount !== false) {
                                echo "
                                <script>
                                    alert('Bạn đã cập nhật sản phẩm thành công !!!');
                                    window.location.href = 'list_product.php';
                                </script>"; 
                            }
                        }
                    }
                }
            }     
        }
    }
?>