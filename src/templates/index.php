<?php function drawMainHeader() { ?>

<!DOCTYPE html>
<html lang = "en-US">
    <head>
        <title>FEUPTech - tbd</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../index_style.css">
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
        <script src="https://kit.fontawesome.com/38229b6c34.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <h1>FEUPTech</h1>
            <h3>Slogan of Website</h3>
            <div id="signup">
                <a href ="profile.html"><i class="fa-solid fa-user"></i></a>
                <a href="register.html">Register</a>
                <!-- <p>|</p> -->
                <a href="login.html">Login</a>
            </div>
        </header>
        <nav id="menu">
                <h2>
                    <img src="images/FAQ.png" alt="Frequently Asked Questions image">
                    <a href="faq.html"><i class="fa-solid fa-arrow-right"></i></a>
                </h2>
                <h2>
                    <img src="images/About.png" alt="About Us Image">
                    <a href="about.html"><i class="fa-solid fa-arrow-right"></i></a>
                </h2>
                <h2>
                    <img src="images/Contacts.png" alt="Contacts Image">
                    <a href="contacts.html"><i class="fa-solid fa-arrow-right"></i></a>
                </h2>
        </nav>
    </body>
</html>
<?php } ?>

