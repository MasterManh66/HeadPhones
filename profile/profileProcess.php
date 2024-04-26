<?php 
    session_start();
    include("../config/connect.php");

    if(isset($_POST["submit"])) { 
        if(!isset($_SESSION["accId"])) {
            die("Không tìm thấy thông tin tài khoản");
        } else {
            $accId = $_SESSION["accId"];

            $sql_select = "SELECT * FROM customers WHERE accId = '$accId'";
            $kt_select = sqlsrv_query($conn,$sql_select);

            if ($kt_select == false) {
                die("Query failed: " . print_r(sqlsrv_errors(), true));
            } else {
                $row = sqlsrv_fetch_array($kt_select , SQLSRV_FETCH_ASSOC);

                $cusName = !empty($_POST["name"]) ? $_POST["name"] : $row["cusName"];
                $cusPhoneNumber = !empty($_POST["phone"]) ? $_POST["phone"] : $row["cusPhoneNumber"];
                $cusGerder = !empty($_POST["gerder"]) ? $_POST["gerder"] : $row["cusGerder"];
                $cusAddress = !empty($_POST["address"]) ? $_POST["address"] : $row["cusAddress"];
                $cusEmail = !empty($_POST["email"]) ? $_POST["email"] : $row["cusEmail"];

                $sql_update = "UPDATE customers 
                SET cusName='$cusName', cusPhoneNumber='$cusPhoneNumber', cusGerder='$cusGerder',
                cusAddress='$cusAddress', cusEmail='$cusEmail' WHERE accId = $accId";
                $ktupdate = sqlsrv_query($conn,$sql_update);

                if ($ktupdate === false) {
                    die("Query failed: " . print_r(sqlsrv_errors(), true));
                } else {
                    echo "<script>alert('Bạn đã thay đổi thông tin thành công !!!');</script>";
                    header("Location: profile.php");
                    exit;
                }
            }
        }
    }

?>