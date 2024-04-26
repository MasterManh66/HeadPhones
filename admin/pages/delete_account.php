<?php 
    session_start();
    include("../../config/connect.php");

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql_delete = "DELETE FROM accounts WHERE accId = '$id'";
        $kt_delete = sqlsrv_query($conn , $sql_delete);
        echo "
        <script>
            alert('Bạn đã xoá tài khoản thành công !!!');
            window.location.href = 'adminControl.php';
        </script>";        
        // header("Location: adminControl.php");
    }
?>