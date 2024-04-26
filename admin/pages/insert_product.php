<?php include("header.php"); ?>
<form class="form" action="change_product.php" method="post" enctype="multipart/form-data">
    <div class="profile__view-edit">
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Tên sản phẩm
                </span>
                <span class="profile__view-edit-text">
                    Thêm sản phẩm
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
                <span class="profile__view-edit-text">
                    Thêm loại sản phẩm
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
                <span class="profile__view-edit-text">
                    Thêm tiêu đề
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
                <span class="profile__view-edit-text">
                    Thêm mô tả
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
                <span class="profile__view-edit-text">
                    Thêm ảnh sản phẩm
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
                <span class="profile__view-edit-text">
                    Thêm màu sản phẩm
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
                <span class="profile__view-edit-text">
                    Thêm thương hiệu
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
                <span class="profile__view-edit-text">
                    Thêm giá nhập sản phẩm
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
                <span class="profile__view-edit-text">
                    Thêm giá bán ra sản phẩm
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
                <span class="profile__view-edit-text">
                    Thêm số lượng sản phẩm
                </span>
            </div>
            <div class="profile__view-update">
                <input type="number" min="0" max="100" name="productQuantity" class="profile__update-person"
                    placeholder="Nhập giá số lượng sản phẩm vào">
            </div>
        </div>

        <div class="profile__edit-footer">
            <input type="submit" name="submit" class="profile__edit-footer-submit"
                value="Lưu">
        </div>
    </div>
</form>
<?php
    include("footer.php");
?>