<?php 
    session_start();
    include("../../config/connect.php");

    if (isset($_GET["productId"])) {
        $productId = $_GET["productId"];

        $sql_delete = "DELETE FROM products WHERE products.productId = '$productId'";
        $kt_delete = sqlsrv_query($conn, $sql_delete);

        $sql_delete_depot = "DELETE FROM depot WHERE depot.productId = '$productId'";
        $kt_delete_depot = sqlsrv_query($conn, $sql_delete_depot);

        header("location: list_product.php");
    }
?>