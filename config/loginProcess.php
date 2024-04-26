<?php 
session_start();
include('connect.php');

if (isset($_POST['username']) && $_POST['password']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "") {
        $_SESSION['tb'] = "Username đang trống !";
        header("location: ../login.php");
        exit();
    }

    if ($password == "") {
        $_SESSION['tb'] = "Password đang trống !";
        header("location: ../login.php");
        exit();
    }

    $sql = "SELECT * FROM ACCOUNTS WHERE username = ? AND password = ?";
    $params = array($username, $password);
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt && sqlsrv_execute($stmt)) {
        if (sqlsrv_has_rows($stmt) === true) {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            if ($row) {
                $_SESSION['username'] = $username;
                $_SESSION['roleId'] = $row['roleId'];
                $_SESSION['accId'] = $row['accId'];

                if($_SESSION['roleId'] == 1)    
                {
                    header('Location: ../admin/admin.php');
                }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                if($_SESSION['roleId'] == 2)    
                {
                    header('Location: ../employee/indexEmp.php');
                }       
                if($_SESSION['roleId'] == 3)    
                {
                    header('Location: ../user/indexUser.php');
                }       
                
            } else {
                echo "Tên đăng nhập hoặc mật khẩu không đúng.";
            }
        } else {
            $_SESSION['tb'] = "Tài khoản hoặc mật khẩu không đúng.";
            header("location: ../login.php");
        }
        sqlsrv_free_stmt($stmt);
    } else {
        echo "Lỗi khi thực hiện truy vấn: " . print_r(sqlsrv_errors(), true);
    }
}
?>
