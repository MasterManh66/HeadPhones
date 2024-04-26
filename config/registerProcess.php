<?php 
session_start();
include('connect.php');

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cusName = $_POST["cusname"];
    $cusPhoneNumber = $_POST["cusphone"];
    $cusAddress = $_POST["cusaddress"];
    $cusEmail = $_POST["cusemail"];

    if ($username == "" || $password == "" || $cusName == "" || $cusPhoneNumber == "" || $cusAddress == "" ) {
        echo "Vui Lòng Điền Đầy Đủ Thông Tin";
    }
    else {
        $sql = "SELECT * FROM ACCOUNTS WHERE username = '$username'";
        $kt = sqlsrv_query($conn,$sql);

        if ($kt == false) {
            die("Query failed: " . print_r(sqlsrv_errors(), true));
        }
        else {
            $sql = "INSERT INTO ACCOUNTS (username, password, roleId, updateAt,systemDate)
             VALUES ('$username','$password',3,GetDate(),GetDate())";
            sqlsrv_query($conn, $sql);

            $sql_get_accId = "SELECT SCOPE_IDENTITY() AS accId";
            $result = sqlsrv_query($conn, $sql_get_accId);

            // Kiểm tra nếu câu lệnh SQL thực hiện thành công
            if ($result !== false) {
                // Lấy dữ liệu từ kết quả trả về
                $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                // Lấy giá trị accId từ mảng kết quả
                $accId = $row['accId'];
            } else {
                // Xử lý lỗi nếu câu lệnh SQL thất bại
                echo "Error: " . sqlsrv_errors();
            }

            $sql = "INSERT INTO CUSTOMERS (cusName,cusPhoneNumber,cusAddress,cusEmail,accId,systemDate)
             VALUES ('$cusName', '$cusPhoneNumber','$cusAddress','$cusEmail',$accId,GETDATE())";
            sqlsrv_query($conn,$sql);
            echo "
            <script>
                alert('Bạn đã đăng ký tài thành công !!!');
                window.location.href = '../login.php';
            </script>"; 
        }

    }
}
?>