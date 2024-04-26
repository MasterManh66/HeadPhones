<?php 
    include("header.php");
?>
<form class="form" action="add_category.php" method="post">
    <div class="profile__view-edit">
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Tên danh mục
                </span>
                <span class="profile__view-edit-text">
                    Thêm danh mục
                </span>
            </div>
            <div class="profile__view-update">
                <input type="text" name="cateName" class="profile__update-person" placeholder="Nhập tên danh mục mới">
            </div>
        </div>
        <div class="profile__view-edit-change">
            <div class="profile__view-change-name">
                <span class="profile__view-text">
                    Icon danh mục
                </span>
                <span class="profile__view-edit-text">
                    Thêm icon
                </span>
            </div>
            <div class="profile__view-update">
                <div class="profile__view-update-select">
                    <input type="radio" name="cateIcons" class="profile__update-gerder" value="fa-solid fa-mobile-screen-button">
                    <label for="Điện thoại" class="profile__view-update-gerder"><i
                            class="header__menu-icon fa-solid fa-mobile-screen-button"></i></label>
                    <input type="radio" name="cateIcons" class="profile__update-gerder" value="fa-solid fa-laptop">
                    <label for="Laptop" class="profile__view-update-gerder"><i
                            class="header__menu-icon fa-solid fa-laptop"></i></label>
                    <input type="radio" name="cateIcons" class="profile__update-gerder" value="fa-solid fa-headphones-simple">
                    <label for="Tai Nghe" class="profile__view-update-gerder"><i
                            class="header__menu-icon fa-solid fa-headphones-simple"></i></label>
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
                        $sql = "SELECT category.*, brands.* FROM category
                                RIGHT JOIN brands ON category.brandId = brands.brandId";
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
        <div class="profile__edit-footer">
            <input type="submit" name="submit" class="profile__edit-footer-submit" value="Lưu">
        </div>
    </div>
</form>
<?php
    if(isset($_POST["submit"])) {
        $cateName = $_POST["cateName"];
        $cateIcons = $_POST["cateIcons"];
        $brandId = $_POST["brandId"];

        $sql_cate = "INSERT INTO category (cateName , cateIcons , brandId , updateAt , systemDate) 
        VALUES ('$cateName' , '$cateIcons' , '$brandId' , GETDATE(), GETDATE())";

        $kt_cate = sqlsrv_query($conn , $sql_cate);

        if ($kt_cate == false) {
            die("Query failed: " . print_r(sqlsrv_errors(), true));
        }
        else {
            echo '<script>alert("Đã thêm thương hiệu thành công!")</script>';
        }
    }
    include("footer.php");
?>