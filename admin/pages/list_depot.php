<?php
    include("header.php");
    $sql = "SELECT products.* , depot.* FROM products
    INNER JOIN depot ON products.productId = depot.productId";
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
                <th>ID SP</th>
                <th>Tên sản phẩm</th>
                <th>Giá nhập</th>
                <th>Giá bán</th>
                <th>Giảm giá</th>
                <th>Số lượng</th>
                <th>Chức năng</th>
                </tr>";
            while ($row = sqlsrv_fetch_array($kt, SQLSRV_FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["productId"] . "</td>";
                echo "<td class='product_name'>" . $row["productName"] . "</td>";
                echo "<td>" . $row["depotInputPrice"] . " đ</td>";
                echo "<td>" . $row["depotOutputPrice"] . " đ</td>";
                echo "<td>" . $row["productDiscountPrice"] . " %</td>";
                echo "<td>" . $row["productQuantity"] . " chiếc</td>";
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