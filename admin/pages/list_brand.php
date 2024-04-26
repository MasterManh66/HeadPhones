<?php
    include("header.php");
    $sql = "SELECT * FROM brands";
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
                <th>Tên thương hiệu</th>
                <th>logo</th>
                <th>Chức năng</th>
                </tr>";
            while ($row = sqlsrv_fetch_array($kt, SQLSRV_FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["brandName"] . "</td>";
                echo "<td><img class='profile__view-logo' src='../../" . $row['brandLogo'] . "' alt='Brand Logo'></td>";
                echo "<td><a class='profile_link-delete' href='delete_account.php?id=" . $row["brandId"] . "'>Xoá</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Không có thương hiệu nào.";
        }
    }
    
    include("footer.php");                       
 ?>