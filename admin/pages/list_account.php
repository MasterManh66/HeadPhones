<?php 
    include("header.php");
    
    $sql = "SELECT * FROM accounts";
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
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Quyền hạn</th>
                <th>Chức năng</th>
                </tr>";
            while ($row = sqlsrv_fetch_array($kt, SQLSRV_FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";                                
                echo "<td>" . $row["password"] . "</td>";                                
                $accId = $row["accId"];                                
                $sql_quyen = "SELECT roleName FROM roles INNER JOIN accounts ON accounts.roleId = roles.roleId WHERE accId = $accId";                              
                $kt_quyen = sqlsrv_query($conn, $sql_quyen);                                            
                                                            
                if ($kt_quyen === false) {
                    echo "<td>Error</td>";
                } else {                                
                    if (sqlsrv_has_rows($kt_quyen)) {                                
                        $quyen_row = sqlsrv_fetch_array($kt_quyen, SQLSRV_FETCH_ASSOC);
                        echo "<td>" . $quyen_row["roleName"] . "</td>";                                                              
                    } else {                              
                            echo "<td>Unknown</td>";                            
                    }                              
                }                                                                
                echo "<td><a class='profile_link-delete' href='delete_account.php?id=" . $row["accId"] . "'>Xoá</a></td>";                            
                echo "</tr>";                               
            }                                     
                                          
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Không có tài khoản nào.";
        }
    }
    include("footer.php");
?>                               
