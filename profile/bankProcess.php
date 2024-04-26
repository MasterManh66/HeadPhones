<?php
    session_start();
    include("../config/connect.php");

    if(isset($_POST["submit"])) { 
        if(!isset($_SESSION["accId"])) {
            die("Không tìm thấy thông tin tài khoản");
        } else {
            $accId = $_SESSION["accId"];
            $sql = "SELECT bankInfo.* FROM customers
                    INNER JOIN bankInfo ON customers.bankId = bankInfo.bankId
                     WHERE accId = '$accId'";
                                                        
            $ktbank = sqlsrv_query($conn , $sql);
                
            if (sqlsrv_has_rows($ktbank)) {
                if ($row = sqlsrv_fetch_array($ktbank,SQLSRV_FETCH_ASSOC)) {
                    $bankName = !empty($_POST["bankName"]) ? $_POST["bankName"] : $row["bankName"];
                    $bankNumber = !empty($_POST["bankNumber"]) ? $_POST["bankNumber"] : $row["bankNumber"];
                    $bankOwner = !empty($_POST["bankOwner"]) ? $_POST["bankOwner"] : $row["bankOwner"];
                    $bankBranch = !empty($_POST["bankBranch"]) ? $_POST["bankBranch"] : $row["bankBranch"];

                    $sql_update = "UPDATE bankInfo SET bankName = '$bankName', bankNumber = '$bankNumber', bankOwner = '$bankOwner', bankBranch = '$bankBranch' WHERE bankId IN (SELECT bankId FROM customers WHERE accId = '$accId')";
                    $ktupdate = sqlsrv_query($conn, $sql_update);
                        if ($ktupdate === false) {
                            die("Query failed update: " . print_r(sqlsrv_errors(), true));
                        } else {
                            echo "<script>alert('Thông tin ngân hàng đã được cập nhật !!!');</script>";
                            header("Location: bank.php");
                            exit;
                    }
                }
            } else {
                $bankName = $_POST["bankName"];
                $bankNumber = $_POST["bankNumber"];
                $bankOwner = $_POST["bankOwner"];
                $bankBranch = $_POST["bankBranch"];

                $sql_insert = "INSERT INTO bankInfo (bankName, bankNumber, bankOwner, bankBranch) VALUES ('$bankName', '$bankNumber', '$bankOwner', '$bankBranch')";
                $ktinsert = sqlsrv_query($conn, $sql_insert);
                    if ($ktinsert === false) {
                        die("Query failed insert: " . print_r(sqlsrv_errors(), true));
                    } else {
                        $sql_get_bankid = "SELECT SCOPE_IDENTITY() AS bankId";
                        $kt_get_bankid = sqlsrv_query($conn, $sql_get_bankid);
                            if ($kt_get_bankid !== false) {
                                $row = sqlsrv_fetch_array($kt_get_bankid, SQLSRV_FETCH_ASSOC);
                                $bankId = $row['bankId'];

                                $sql_update_customers = "UPDATE customers SET bankId = '$bankId' WHERE accId = '$accId'";
                                $kt_update_customers = sqlsrv_query($conn, $sql_update_customers);
                                    
                                if ($kt_update_customers === false) {
                                    die("Update failed update customers: " . print_r(sqlsrv_errors(), true));
                                } else {
                                    echo "<script>alert('Thông tin ngân hàng đã được thêm mới !!!');</script>";
                                    header("Location: bank.php");
                                    exit;
                                }
                            }
                        }
                }    

            }
    }
?>