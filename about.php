<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TINDACO - Giới Thiệu</title>
    <link rel="icon" href="./assets/image/Logo YTB US.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.5.1/fontawesome-free-6.5.1-web/css/all.min.css">
</head>
<style>
    .about_header {
        font-size: 3rem;
        margin: 5rem 0;
        text-align: center;
        font-weight: 600;
    }
    .about-img {
        width: 50%;
        float: right;
    }
    .about_text {
        font-size: 2rem;
        text-align: justify;
        line-height: 2.5rem;
    }
</style>
<body>
    <?php 
        include("includes/header.php");
    ?>
    <div class="container_about">
        <div class="grid">
            <div class="about_header">
                Giới Thiệu Về Chúng Tôi
            </div>
            <div class="about_body">
                <div class="grid__row">
                    <div class="grid__column-6">
                        <span class="about_text">
                        TINDACO là một trong những nhà cung cấp hàng đầu về sản phẩm tai nghe chất lượng cao từ các hãng nổi tiếng như Apple, JBL, Sony, Samsung và nhiều hãng khác trên thị trường. Với cam kết mang đến trải nghiệm âm thanh tuyệt vời và đa dạng các sản phẩm phù hợp với nhu cầu của mọi người, TINDACO đã trở thành điểm đến tin cậy cho những người yêu thích công nghệ và âm nhạc.
                        Với một loạt các sản phẩm từ tai nghe không dây đến tai nghe chụp đầu và tai nghe earbud, TINDACO cung cấp sự lựa chọn đa dạng để đáp ứng mọi nhu cầu và sở thích cá nhân của khách hàng. Không chỉ vậy, TINDACO còn cam kết mang đến dịch vụ chăm sóc khách hàng tốt nhất, giúp khách hàng tìm kiếm và chọn lựa sản phẩm phù hợp nhất với họ.
                        Với đội ngũ nhân viên am hiểu về công nghệ và âm nhạc, cùng với sự cam kết về chất lượng sản phẩm, TINDACO tự tin là đối tác lý tưởng cho mọi người trong hành trình tìm kiếm trải nghiệm âm nhạc hoàn hảo.
                        </span>
                    </div>
                    <div class="grid__column-6">
                        <div class="about_img-head">
                        <img class="about-img" src="https://sonytantan.com/wp-content/uploads/2022/02/tai-nghe-khong-day-sony-linkbuds-wf-l900-3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include("includes/footer.php"); ?>
</body>
</html>