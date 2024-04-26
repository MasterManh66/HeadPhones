<?php 
    session_start();
    include("../../config/connect.php");

    if (isset($_GET["cateId"])) {
        $cateId = $_GET["cateId"];

        $sql_delete = "DELETE FROM category WHERE cateId = '$cateId'";
        $kt_delete = sqlsrv_query($conn, $sql_delete);
        echo "
        <script>
            alert('Bạn đã xoá danh mục thành công !!!');
            window.location.href = 'list_category.php';
        </script>"; 
        // header("location: list_category.php");
    }
?>