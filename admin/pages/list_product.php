<?php
    include("header.php");
    $sql = "SELECT products.* , brands.* FROM products
    INNER JOIN brands ON products.brandId = brands.brandId";
    $kt = sqlsrv_query($conn , $sql);

    if ($kt === false) {
        echo "Query failed: " . print_r(sqlsrv_errors(), true);
    } else {
        if (sqlsrv_has_rows($kt)) {
            echo "<div class='profile__view-edit'>
                <div class='profile__view-edit-change'>
                <div class='profile__view-change-name'>";
            echo "<table>";
            echo "<tr style='background-color: #c8f7e7'>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Kiểu sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Màu</th>
                <th>Thương hiệu</th>
                <th>Chức năng</th>
                </tr>";
            while ($row = sqlsrv_fetch_array($kt, SQLSRV_FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["productId"] . "</td>";
                echo "<td class='product_name'>" . $row["productName"] . "</td>";
                echo "<td>" . $row["productType"] . "</td>";
                // echo "<td>" . $row["productTitle"] . "</td>";
                // echo "<td class='product_description'>" . $row["productDescription"] . "</td>";
                echo "<td><img class='profile__view-logo' src='../../" . $row['productImgThumbnail'] . "' alt='Ảnh sản phẩm'></td>";
                echo "<td><p class='product_color' style='background-color:" . $row["productColor"] . "'></p></td>";
                echo "<td>" . $row["brandName"] . "</td>";
                echo "<td class='product_function'><a class='profile_link-update' href='edit_product.php?productId=" . $row["productId"] . "'>Sửa</a>
                <a class='profile_link-delete' href='delete_product.php?productId=" . $row["productId"] . "'>Xoá</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Không có sản phẩm nào.";
        }
    }
    
    include("footer.php");                       
 ?>