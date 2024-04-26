<?php 
    session_start();
    include("../../config/connect.php");

    if (isset($_GET["brandId"])) {
        $brandId = $_GET["brandId"];

        $sql_delete = "DELETE FROM brands WHERE brandId = '$brandId'";
        $kt_delete = sqlsrv_query($conn, $sql_delete);
        echo "
        <script>
            alert('Bạn đã xoá thương hiệu thành công !!!');
            window.location.href = 'list_brand.php';
        </script>"; 
        // header("location: list_brand.php");
    }
?>