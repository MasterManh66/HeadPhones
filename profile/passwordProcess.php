<?php 

session_start();
include("../config/connect.php");

        if (isset($_POST["submit"])) {
            if(!isset($_SESSION["accId"])) {
                die("Không tìm thấy thông tin tài khoản");
            } else {
                $accId = $_SESSION["accId"];
    
                $sql_select = "SELECT * FROM accounts WHERE accId = '$accId'";
                $kt_select = sqlsrv_query($conn,$sql_select);
    
                if ($kt_select == false) {
                    die("Query failed: " . print_r(sqlsrv_errors(), true));
                } else {
                    $row = sqlsrv_fetch_array($kt_select , SQLSRV_FETCH_ASSOC);

                    $password = !empty($_POST["password"]) ? $_POST["password"] : $row["password"];

                    $sql_update = "UPDATE accounts SET password = '$password' WHERE accId = '$accId'";
                    $ktupdate = sqlsrv_query($conn,$sql_update);
                    if ($ktupdate === false) {
                        die("Query failed: " . print_r(sqlsrv_errors(), true));
                    } else {
                        echo "<script>alert('Bạn đã cập nhật mật khẩu thành công !!!');</script>";
                        // header("Location: password.php");
                        // exit;
                    }
                }
            }
        }
    ?>