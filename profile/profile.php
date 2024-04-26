<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TINDACO - HeadPhones</title>
    <link rel="icon" href="../assets/image/Logo YTB US.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.5.1/fontawesome-free-6.5.1-web/css/all.min.css">
</head>

<body>
    <?php 
        session_start();
        include("../config/connect.php");
        include("../config/headerConnect.php");
    ?>

    <div class="profile">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__column-3">
                    <div class="profile__navbar">
                        <div class="profile__navbar-wrap">
                            <div class="profile__navbar-header">
                                <div class="profile__navbar-info">
                                    <i class="profile__navbar-info-icon fa-solid fa-circle-user"></i>
                                    <div class="profile__navbar-info-wrap">
                                        <div class="profile__navbar-info-head">
                                            <?php 
                                                if(isset($_SESSION['username'])) {
                                                    $username = $_SESSION['username'];
                                                    echo $username ;
                                                }else {
                                                    echo "username";
                                                }
                                            ?>
                                        </div>
                                        <a href="profile.php" class="profile__navbar-info-body">
                                            <i class="profile__navbar-info-body-icon fa-solid fa-pen"></i>
                                            <h4 class="profile__navbar-info-body-name">
                                                Sửa Hồ Sơ
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="profile__navbar-list">
                                <div class="profile__navbar-item">
                                    <div class="profile__navbar-item-wrap">
                                        <div class="profile__navbar-item__user">
                                            <i class="profile__navbar-item-icon__user fa-regular fa-user"></i>
                                            <div class="profile__navbar-item-name">
                                                Tài Khoản Của Tôi
                                            </div>
                                        </div>
                                        <div class="profile__user-list">
                                            <a class="profile__user-link" href="profile.php">
                                                <div class="profile__user-item  profile_active">
                                                    <h4 class="profile__user-name">
                                                        Hồ Sơ
                                                    </h4>
                                                </div>
                                            </a>
                                           <a class="profile__user-link" href="bank.php">
                                                <div class="profile__user-item">
                                                    <h4 class="profile__user-name">
                                                        Ngân Hàng
                                                    </h4>
                                                </div>
                                            </a>
                                            <a class="profile__user-link" href="password.php">
                                                <div class="profile__user-item">
                                                    <h4 class="profile__user-name">
                                                        Đổi Mật Khẩu
                                                    </h4>
                                                </div> 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile__navbar-item">
                                    <i class="profile__navbar-item-icon__order fa-regular fa-clipboard"></i>
                                    <div class="profile__navbar-item-name">
                                        Đơn Mua
                                    </div>
                                </div>
                                <div class="profile__navbar-item">
                                    <i class="profile__navbar-item-icon__bell fa-regular fa-bell"></i>
                                    <div class="profile__navbar-item-name">
                                        Thông Báo
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid__column-9">
                    <div class="profile__view">
                        <div class="profile__view-wrap">
                            <div class="profile__view-head">
                                <div class="profile__view-title">
                                    Hồ Sơ Của Tôi
                                </div>
                                <div class="profile__view-name">
                                    Quản lý thông tin hồ sơ để bảo mật tài khoản
                                </div>
                            </div>
                            <div class="profile__view-body">
                                <form class="form" action="profileProcess.php" method="post">
                                    <div class="profile__view-edit">
                                        <div class="profile__view-edit-change">
                                            <div class="profile__view-change-name">
                                                <span class="profile__view-text">
                                                    Tên người dùng
                                                </span>
                                                <?php 
                                                if (isset($_SESSION['accId'])) {
                                                    $accId = $_SESSION['accId'];
                                                    $sql = "SELECT cusName FROM customers WHERE accId = '$accId'";
                                                    $ktname = sqlsrv_query($conn , $sql);

                                                    if ($row = sqlsrv_fetch_array($ktname, SQLSRV_FETCH_ASSOC)) {
                                                        echo $row["cusName"];
                                                    } else {
                                                        echo "Khong the thuc thi";
                                                    }
                                                } else {
                                                    echo "Khong ket noi duoc";
                                                }
                                            ?>
                                                <span class="profile__view-edit-text">
                                                    <?php 
                                                        if (!empty($row['cusName'])) {
                                                            echo "Thay đổi Tên người dùng";
                                                        } else {
                                                            echo "Thêm Tên người dùng";
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="profile__view-update">
                                                <input type="text" name="name" class="profile__update-person"
                                                    placeholder="Nhập tên mới">
                                            </div>

                                        </div>
                                        <div class="profile__view-edit-change">
                                            <div class="profile__view-change-name">
                                                <span class="profile__view-text">
                                                    Số điện thoại
                                                </span>
                                                <?php 
                                                    $sql = "SELECT cusPhoneNumber FROM customers WHERE accId = '$accId'" ;
                                                    $ktphone = sqlsrv_query($conn , $sql);

                                                    if ($row = sqlsrv_fetch_array($ktphone, SQLSRV_FETCH_ASSOC)) {
                                                        echo $row['cusPhoneNumber'];
                                                    } else {
                                                        echo "khong the thuc thi";
                                                    }
                                            ?>
                                                <span class="profile__view-edit-text">
                                                    <?php 
                                                        if (!empty($row['cusPhoneNumber'])) {
                                                            echo "Thay đổi Số điện thoại";
                                                        } else {
                                                            echo "Thêm Số điện thoại";
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="profile__view-update">
                                                <input type="text" name="phone" class="profile__update-person"
                                                    placeholder="Nhập số điện thoại mới">
                                            </div>
                                        </div>

                                        <div class="profile__view-edit-change">
                                            <div class="profile__view-change-name">
                                                <span class="profile__view-text">
                                                    Giới tính
                                                </span>
                                                <?php 
                                                    $sql = "SELECT cusGerder FROM customers WHERE accId = '$accId'";
                                                    $ktgerder = sqlsrv_query($conn , $sql);

                                                    if ($row = sqlsrv_fetch_array($ktgerder , SQLSRV_FETCH_ASSOC)) {
                                                        echo $row['cusGerder'];
                                                    } else {
                                                        echo "Khong the thuc thi";
                                                    }
                                            ?>
                                                <span class="profile__view-edit-text">
                                                    <?php 
                                                        if (!empty($row['cusGerder'])) {
                                                            echo "Thay đổi Giới tính";
                                                        } else {
                                                            echo "Thêm Giới tính";
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="profile__view-update">
                                                <div class="profile__view-update-select">
                                                    <input type="radio" name="gerder" class="profile__update-gerder"
                                                        value="Nam">
                                                    <label for="nam" class="profile__view-update-gerder">Nam</label>
                                                    <input type="radio" name="gerder" class="profile__update-gerder"
                                                        value="Nữ">
                                                    <label for="nữ" class="profile__view-update-gerder">Nữ</label>
                                                    <input type="radio" name="gerder" class="profile__update-gerder"
                                                        value="Khác">
                                                    <label for="khác" class="profile__view-update-gerder">Khác</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="profile__view-edit-change">
                                            <div class="profile__view-change-name">
                                                <span class="profile__view-text">
                                                    Địa chỉ
                                                </span>
                                                <?php 
                                                    $sql = "SELECT cusAddress FROM customers WHERE accId = '$accId'";
                                                    $ktaddress = sqlsrv_query($conn , $sql);

                                                    if ($row = sqlsrv_fetch_array($ktaddress , SQLSRV_FETCH_ASSOC)) {
                                                        echo $row['cusAddress'];
                                                    } else {
                                                        echo "Khong the thuc thi";
                                                    }
                                            ?>
                                                <span class="profile__view-edit-text">
                                                    <?php 
                                                        if (!empty($row['cusAddress'])) {
                                                            echo "Thay đổi Địa chỉ";
                                                        } else {
                                                            echo "Thêm Địa chỉ";
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="profile__view-update">
                                                <input type="text" name="address" class="profile__update-person"
                                                    placeholder="Nhập địa chỉ mới">
                                            </div>

                                        </div>
                                        <div class="profile__view-edit-change">
                                            <div class="profile__view-change-name">
                                                <span class="profile__view-text">
                                                    Email
                                                </span>
                                                <?php 
                                                    $sql = "SELECT cusEmail FROM customers WHERE accId = '$accId'";
                                                    $ktemail = sqlsrv_query($conn , $sql);

                                                    if ($row = sqlsrv_fetch_array($ktemail , SQLSRV_FETCH_ASSOC)) {
                                                        echo $row['cusEmail'];
                                                    } else {
                                                        echo "Khong the thuc thi";
                                                    }
                                            ?>
                                                <span class="profile__view-edit-text">
                                                    <?php 
                                                        if (!empty($row['cusEmail'])) {
                                                            echo "Thay đổi email";
                                                        } else {
                                                            echo "Thêm email";
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="profile__view-update">
                                                <input type="eamil" name="email" class="profile__update-person"
                                                    placeholder="Nhập email mới">
                                            </div>

                                        </div>

                                        <div class="profile__edit-footer">
                                            <input type="submit" name="submit" class="profile__edit-footer-submit"
                                                value="Lưu">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php 
            include("../config/footerConnect.php");
        ?>
    </div>

    <script>
    var proActive = document.getElementsByClassName("profile__user-item");
    for (var i = 0; i < proActive.length; i++) {
        proActive[i].addEventListener("click", function() {
            var move = document.getElementsByClassName("profile_active");
            if (move.length > 0) {
                move[0].classList.remove("profile_active");
            }
            this.classList.add("profile_active");
        });
    }
    </script>

    <script>
        var profileOpen = document.querySelectorAll(".profile__view-update");
        var profileClick = document.querySelectorAll(".profile__view-edit-text");

        profileClick.forEach(function(element) {
            element.addEventListener("click", function() {
            profileOpen.forEach(function(item) {
                item.classList.add("profile__view-update-open");
            });
    });
});
    </script>

</body>

</html>