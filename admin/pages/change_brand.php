<?php include("header.php"); ?>
<form class="form" action="change_brand.php" method="post" enctype="multipart/form-data">
    <div class="profile__view-edit">
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Tên thương hiệu
                </span>
                <span class="profile__view-edit-text">
                    Thêm thương hiệu
                </span>
            </div>
        <div class="profile__view-update">
            <input type="text" name="brandName" class="profile__update-person"
                placeholder="Nhập tên thương hiệu mới">
        </div>
    </div>
    <div class="profile__view-edit-change">
        <div class="profile__view-change-name">
            <span class="profile__view-text">
                logo thương hiệu
            </span>
            <span class="profile__view-edit-text">
                Thêm logo thương hiệu
            </span>
        </div>
        <div class="profile__view-update">
            <input type="file" name="fileUpload" class="profile__update-person">
        </div>
    </div>
    <div class="profile__edit-footer">
        <input type="submit" name="submit" class="profile__edit-footer-submit"
            value="Lưu">
    </div>
</form>
    <?php
            if(isset($_POST["submit"])) {
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

                    if($uploadOk == 1  && $uploadSize < 100000) {
                        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                            $brandName = $_POST["brandName"];
                            $brandLogo = $subString;

                            $sql_brand = "INSERT INTO brands VALUES ('$brandName' , '$brandLogo' , GETDATE())";
                            $kt_brand = sqlsrv_query($conn , $sql_brand);

                            if($kt_brand == false) {
                                die("Query failed: " . print_r(sqlsrv_errors(), true));
                            }
                            else {
                                echo "
                                <script>
                                    alert('Bạn đã thêm thương hiệu thành công !!!');
                                    window.location.href = 'list_brand.php';
                                </script>"; 
                            }
                        } else {
                            echo "Sorry , error upload file ...";
                        }
                    }
                } else {
                    echo "No file upload";
                }
            }
        include("footer.php");
    ?>