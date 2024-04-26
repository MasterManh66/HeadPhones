<?php 
    session_start();
    include("../../config/connect.php");


    if (isset($_POST["submit"])) {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (!empty($_FILES["fileUpload"]["name"])) {
                $uploadDir = '../../fileUpload/';
                $uploadSize = $_FILES["fileUpload"]["size"];
                $uploadedFile = $uploadDir.time()."-".basename($_FILES["fileUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    
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
                $subString = substr($uploadedFile, $preferStringLength);
    
                if($uploadOk == 1 && $uploadSize < 100000) {
                    if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploadedFile)){
                        $productName = $_POST["productName"];
                        $productType = $_POST["productType"];
                        $productTitle = $_POST["productTitle"];
                        $productDescription = $_POST["productDescription"];
                        $productImgThumbnail = $subString;
                        $productColor = $_POST["productColor"];
                        $brandId = $_POST["brandId"];
        
                        $depotInputPrice = $_POST["depotInputPrice"];
                        $depotOutputPrice = $_POST["depotOutputPrice"];
                        $productQuantity = $_POST["productQuantity"];
        
                        $sql_insert = "INSERT INTO products (productName, productType, productTitle, productDescription,
                        productImgThumbnail, productColor, brandId)
                        OUTPUT inserted.productId 
                        VALUES ("."N"."'$productName', '$productType', N'$productTitle', N'$productDescription', '$productImgThumbnail',
                        '$productColor', '$brandId')";
                        $kt_insert = sqlsrv_query($conn , $sql_insert);
        
                        if($kt_insert !== false) {
                            $row = sqlsrv_fetch_array($kt_insert , SQLSRV_FETCH_ASSOC);
                            $productId = $row['productId'];
        
                            $sql_insert_depot = "INSERT INTO depot (productId , depotInputPrice, depotOutputPrice ,
                            productQuantity, updateAt , systemdate)
                            VALUES ('$productId', '$depotInputPrice', '$depotOutputPrice', '$productQuantity', GETDATE(), GETDATE() )";
                            $kt_insert_depot = sqlsrv_query($conn , $sql_insert_depot);
        
                            if ($kt_insert_depot !== false) {
                                $sql_select_depot = "SELECT * FROM depot WHERE productId = '$productId'";
                                $kt_select_depot = sqlsrv_query($conn , $sql_select_depot);
        
                                if ($row_depot = sqlsrv_fetch_array($kt_select_depot, SQLSRV_FETCH_ASSOC)) { 
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
                                            alert('Bạn đã thêm sản phẩm thành công !!!');
                                            window.location.href = 'list_product.php';
                                        </script>";
                                        // header("location: list_product.php");
                                    }
                                }
                            }
                        }
                    }
                }
            } 
            else {
                $productName = $_POST["productName"];
                $productType = $_POST["productType"];
                $productTitle = $_POST["productTitle"];
                $productDescription = $_POST["productDescription"];
                $productColor = $_POST["productColor"];
                $brandId = $_POST["brandId"];

                $depotInputPrice = $_POST["depotInputPrice"];
                $depotOutputPrice = $_POST["depotOutputPrice"];
                $productQuantity = $_POST["productQuantity"];

                $sql_insert = "INSERT INTO products (productName, productType, productTitle, productDescription,
                productColor, brandId) 
                VALUES ("."N"."'$productName', '$productType', N'$productTitle', N'$productDescription',
                '$productColor', '$brandId')";
                $kt_insert = sqlsrv_query($conn , $sql_insert);

                if($kt_insert !== false) {
                    $row = sqlsrv_fetch_array($kt_insert , SQLSRV_FETCH_ASSOC);
                    $productId = $row['productId'];

                    $sql_insert_depot = "INSERT INTO depot (productId , depotInputPrice, depotOutputPrice ,
                    productQuantity, updateAt , systemdate)
                    VALUES ('$productId', '$depotInputPrice', '$depotOutputPrice', '$productQuantity', GETDATE(), GETDATE() )";
                    $kt_insert_depot = sqlsrv_query($conn , $sql_insert_depot);

                    if ($kt_insert_depot !== false) {
                        $sql_select_depot = "SELECT * FROM depot WHERE productId = '$productId'";
                        $kt_select_depot = sqlsrv_query($conn , $sql_select_depot);

                        if ($row_depot = sqlsrv_fetch_array($kt_select_depot, SQLSRV_FETCH_ASSOC)) { 
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
                                        alert('Bạn đã thêm sản phẩm thành công !!!');
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