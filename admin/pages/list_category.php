<?php
    include("header.php");
    $sql = "SELECT category.* , brands.brandName FROM category 
    INNER JOIN brands ON category.brandId = brands.brandId 
    WHERE category.brandId = brands.brandId";
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
                <th>Tên danh mục</th>
                <th>Icons</th>
                <th>Thương hiệu</th>
                <th>Chức năng</th>
                </tr>";
            while ($row = sqlsrv_fetch_array($kt, SQLSRV_FETCH_ASSOC)) {
                $brandName = $row['brandName'];
                echo "<tr>";
                echo "<td>" . $row["cateName"] . "</td>";
                echo "<td><i class='" . $row["cateIcons"] . "'></i></td>";
                echo "<td>" . $brandName . "</td>";
                echo "<td><a class='profile_link-delete' href='delete_category.php?id=" . $row["cateId"] . "'>Xoá</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Không có danh mục nào.";
        }
    }
    
    include("footer.php");                       
 ?>