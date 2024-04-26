<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TINDACO - Liên hệ</title>
    <link rel="icon" href="./assets/image/Logo YTB US.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.5.1/fontawesome-free-6.5.1-web/css/all.min.css">
    <style>
        .contact_header {
            text-align: center;
            margin-top: 3rem;
            font-size: 2rem;
        }
        .input_contact {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
        }

        .submit_contact {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
        }

        .submit_contact:hover {
        background-color: #45a049;
        }

        .container_contact {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 10px;
        }

        .column {
        float: left;
        width: 50%;
        margin-top: 6px;
        padding: 20px;
        font-size: 1.8rem;
        }

        .write_contact {
            width: 100%;
            margin-top: 1rem;
        }

        .row:after {
        content: "";
        display: table;
        clear: both;
        }
    </style>
</head>
<body>
    <?php 
        include("includes/header.php");
    ?>
    <div class="contact_header">
        <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
        <p>Chúng tôi sẽ trả lời bạn sớm nhất có thể .</p>
    </div>

    <div class="container_contact grid">
        <div style="text-align:center; font-size: 2rem;">
            <h2>TINDACO</h2>
            <p>Luôn lắng nghe mọi góp ý từ khách hàng</p>
        </div>
        <div class="row">
            <div class="column">
            <img src="https://www.w3schools.com/w3images/map.jpg" style="width:100%">
            </div>
            <div class="column">
            <form action="/action_page.php">
                <label for="fname">First Name</label>
                <input type="text" class="input_contact" id="fname" name="firstname" placeholder="Your name..">
                <label for="lname">Last Name</label>
                <input type="text" class="input_contact" id="lname" name="lastname" placeholder="Your last name..">
                <label for="country">Country</label>
                <select id="country" name="country">
                <option value="australia">Việt Nam</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
                </select></br>
                <label for="subject">Subject</label></br>
                <textarea id="subject" class="write_contact" name="subject" placeholder="Write something.." style="height:170px"></textarea></br>
                <input type="submit" class="submit_contact" value="Submit">
            </form>
            </div>
        </div>
    </div>
</div>
    <?php include("includes/footer.php"); ?>
</body>
</html>