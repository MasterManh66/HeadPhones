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
                                                <div class="profile__user-item ">
                                                    <h4 class="profile__user-name">
                                                        Hồ Sơ
                                                    </h4>
                                                </div>
                                            </a>
                                            <a class="profile__user-link" href="bank.php">
                                                <div class="profile__user-item ">
                                                    <h4 class="profile__user-name">
                                                        Ngân Hàng
                                                    </h4>
                                                </div>
                                            </a>
                                            <a class="profile__user-link" href="password.php">
                                                <div class="profile__user-item">
                                                    <h4 class="profile__user-name  profile_active">
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
                                <form class="form" action="passwordProcess.php" method="post">
                                    <div class="profile__view-edit">
                                        <div class="profile__view-edit-change">
                                            <div class="profile__view-change-name">
                                                <span class="profile__view-text">
                                                    Mật khẩu
                                                </span>
                                                <?php 
                                                if (isset($_SESSION['accId'])) {
                                                    $accId = $_SESSION['accId'];
                                                    $sql = "SELECT password FROM accounts WHERE accId = '$accId'";
                                                    $ktpassword = sqlsrv_query($conn , $sql);

                                                    if ($row = sqlsrv_fetch_array($ktpassword, SQLSRV_FETCH_ASSOC)) {
                                                        echo $row["password"];
                                                    } else {
                                                        echo "Khong the thuc thi";
                                                    }
                                                } else {
                                                    echo "Khong ket noi duoc";
                                                }
                                            ?>
                                                <span class="profile__view-edit-text">
                                                    <?php 
                                                        if (!empty($row['password'])) {
                                                            echo "Thay đổi Mật Khẩu";
                                                        } else {
                                                            echo "Thêm Mật Khẩu";
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="profile__view-update">
                                                <input type="text" name="password" class="profile__update-person"
                                                    placeholder="Nhập mật khẩu mới">
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