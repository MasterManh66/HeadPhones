<?php include("header.php"); ?>
<form class="form" action="update_product.php" method="post" enctype="multipart/form-data">
    <div class="profile__view-edit">
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Tên sản phẩm
                </span>
                <span class="product_view-info">
                <?php 
                    if (isset($_GET['productId'])) {
                        $_SESSION["productId"] = $_GET['productId'];
                        $productId = $_SESSION["productId"];
                        $sql = "SELECT * FROM products WHERE productId = '$productId'";
                        $kt_product_name = sqlsrv_query($conn , $sql);

                        if ($row = sqlsrv_fetch_array($kt_product_name, SQLSRV_FETCH_ASSOC)) {
                            echo $row["productName"];
                        } else {
                            echo "Chưa có tên sản phẩm";
                        }
                    } else {
                        echo "Khong ket noi duoc";
                    }
                ?>    
                </span>           
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['productname'])) {
                        echo "Thay đổi tên ";
                    } else {
                        echo "Thêm tên ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <input type="text" name="productName" class="profile__update-person"
                    placeholder="Nhập tên sản phẩm mới">
            </div>
        </div>
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Loại sản phẩm
                </span>
                    <?php 
                        if ($kt_product_name !== false) {
                            echo $row["productType"];
                        } else {
                            echo "Chưa có kiểu";
                        }
                    ?>
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['productType'])) {
                        echo "Thay đổi loại ";
                    } else {
                        echo "Thêm loại ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <div class="profile__view-update-select">
                    <label for="productType" class="profile__view-update-protype">Chọn kiểu sản phẩm :</label>
                    <select name="productType" id="productType" class="productType_select">
                        <option value="Tai Nghe Bluetooth">Tai Nghe Bluetooth</option>
                        <option value="Tai nghe không dây">Tai nghe không dây</option>
                        <option value="Tai nghe Gaming">Tai nghe Gaming</option>
                        <option value="Tai nghe chụp tai">Tai nghe chụp tai</option>
                        <option value="khác">khác</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Tiêu đề sản phẩm
                </span>
                <span class="product_view-info">
                    <?php
                        if ($kt_product_name !== false) {
                            echo $row["productTitle"];
                        } else {
                            echo "Chưa có tiêu đề";
                        }
                    ?>
                </span>
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['productTitle'])) {
                        echo "Thay đổi tiêu đề ";
                    } else {
                        echo "Thêm tiêu đề ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <input type="text" name="productTitle" class="profile__update-person" placeholder="Nhập tiêu đề sản phẩm mới">
            </div>
        </div>
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Mô tả sản phẩm
                </span>
                <span class="product_view-info-descript">
                    <?php
                        if ($kt_product_name !== false) {
                            echo $row["productDescription"];
                        } else {
                            echo "Chưa có mô tả";
                        }
                    ?>
                </span>
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['productDescription'])) {
                        echo "Thay đổi mô tả ";
                    } else {
                        echo "Thêm mô tả ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <label for="productDescription" class="profile__view-update-protype">Viết mô tả sản phẩm :</label>
                <textarea id="productDescription" class="productDescription_text" name="productDescription" rows="10" cols="50"></textarea>
            </div>
        </div>
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Ảnh sản phẩm
                </span>
                    <?php 
                        if ($kt_product_name !== false) {
                            echo "<img class='profile__view-logo-depot' src='../../" . $row['productImgThumbnail'] . "' alt='Ảnh sản phẩm'>";
                        } else {
                            echo "Chưa có ảnh";
                        }
                    ?>
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['productImgThumbnail'])) {
                        echo "Thay đổi ảnh ";
                    } else {
                        echo "Thêm ảnh ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <input type="file" name="fileUpload" class="profile__update-person">
            </div>
        </div>
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Màu sản phẩm
                </span>
                    <?php 
                        if ($kt_product_name !== false) {
                            echo "<p class='product_color' style='color:" . $row["productColor"] . "'></p>";
                        } else {
                            echo "Chưa có màu";
                        }
                    ?>
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['productColor'])) {
                        echo "Thay đổi màu ";
                    } else {
                        echo "Thêm màu ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <div class="profile__view-update-select">
                    <label for="productColor" class="profile__view-update-protype">Chọn màu sản phẩm :</label>
                    <input type="color" id="productColor" name="productColor" >
                </div>
            </div>
        </div>
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Thương hiệu
                </span>
                    <?php 
                        $sql = "SELECT DISTINCT brands.brandName 
                        FROM products
                        INNER JOIN brands ON products.brandId = brands.brandId
                        WHERE productId = '$productId'";
                        $kt_product_name = sqlsrv_query($conn , $sql);

                        if ($row = sqlsrv_fetch_array($kt_product_name, SQLSRV_FETCH_ASSOC)) {
                            echo $row["brandName"];
                        } else {
                            echo "Chưa có thương hiệu";
                        }
                    ?>
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['brandId'])) {
                        echo "Thay đổi màu ";
                    } else {
                        echo "Thêm màu ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <div class="profile__view-update-select">
                <?php 
                    $sql = "SELECT DISTINCT brands.*
                    FROM products
                    RIGHT JOIN brands ON products.brandId = brands.brandId";
                    $kt_select = sqlsrv_query($conn , $sql);

                    while ($row = sqlsrv_fetch_array($kt_select, SQLSRV_FETCH_ASSOC)) {
                        $brandName = $row['brandName'];
                        $brandId = $row['brandId'];
                        echo '
                            <input type="radio" name="brandId" class="profile__update-gerder" value="' .$brandId.'">
                            <label for="Laptop" class="profile__view-update-gerder">' . $brandName . '</label>
                        ';
                     }
                ?>
                </div>
            </div>
        </div>
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Giá nhập sản phẩm
                </span>
                    <?php 
                        $sql_depot = "SELECT * FROM depot
                        WHERE productId = '$productId'";
                        $kt_depot = sqlsrv_query($conn , $sql_depot);

                        if ($row = sqlsrv_fetch_array($kt_depot, SQLSRV_FETCH_ASSOC)) {
                            echo $row["depotInputPrice"] . " VNĐ";
                        } else {
                            echo "Chưa có giá nhập";
                        }
                    ?>
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['depotInputPrice'])) {
                        echo "Thay đổi giá nhập ";
                    } else {
                        echo "Thêm giá nhập ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <input type="text" name="depotInputPrice" class="profile__update-person"
                    placeholder="Nhập giá sản phẩm nhập vào">
            </div>
        </div>
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Giá bán ra sản phẩm
                </span>
                    <?php 
                        if ($kt_depot) {
                            echo $row["depotOutputPrice"] . " VNĐ";
                        } else {
                            echo "Chưa có giá bán";
                        }
                    ?>
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['depotOutputPrice'])) {
                        echo "Thay đổi giá bán ";
                    } else {
                        echo "Thêm giá bán ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <input type="text" name="depotOutputPrice" class="profile__update-person"
                    placeholder="Nhập giá sản phẩm bán ra">
            </div>
        </div>
        <div class="profile__view-edit-change product_quantity">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Số lượng sản phẩm
                </span>
                    <?php 
                        if ($kt_depot) {
                            echo $row["productQuantity"] . " Chiếc";
                        } else {
                            echo "Chưa có số lượng";
                        }
                    ?>
                <span class="profile__view-edit-text">
                <?php 
                    if (!empty($row['productQuantity'])) {
                        echo "Thay đổi số lượng ";
                    } else {
                        echo "Thêm số lượng ";
                    }
                ?>
                </span>
            </div>
            <div class="profile__view-update">
                <input type="number" min="0" max="100" name="productQuantity" class="profile__update-person"
                    placeholder="Nhập giá số lượng sản phẩm vào">
            </div>
        </div>

        <div class="profile__edit-footer">
            <input type="submit" name="submit" class="profile__edit-footer-submit"
                value="Sửa">
        </div>
    </div>
</form>
<?php
    include("footer.php");
?>