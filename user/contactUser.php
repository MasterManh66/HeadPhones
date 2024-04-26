<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TINDACO - Liên Hệ</title>
    <link rel="icon" href="../assets/image/Logo YTB US.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.5.1/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/js/style.js">
</head>

<body>
    <?php 
        session_start();
        include("../config/connect.php");
        include("../config/headerConnect.php");
    ?>
    

        <?php 
            include("../config/bannerConnect.php");
        ?>
</div>

        <?php 
            include("../config/footerConnect.php");
        ?>
    </div>
</body>

</html>