<?php function drawRegister() { ?>
    <!DOCTYPE html>
<html lang = "en-Us">

    <head>
        <title>FeupTech</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale=1.0">
        <link href="../css/navLogin_style.css" rel="stylesheet">
        <link href="../css/login_style.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <script src="https://kit.fontawesome.com/38229b6c34.js" crossorigin="anonymous"></script>
    </head>

    <body>
        
        <nav>
            <ul class = "navigation">
                <li class = "nav_elem"><a href = "inquiries.html"><i class="fa-solid fa-list-check"></i> Inquiries</a></li>
                <li class = "nav_elem"><a href = "../pages/contacts.php"><i class="fa-solid fa-address-book"></i> Contacts</a></li>
                <li class = "nav_elem"><a href = "../pages/about_us.php"><i class="fas fa-circle-info"></i> About Us</a></li>
                <li class = "nav_elem"><a href = "../pages/faq.php"><i class="fa-solid fa-question"></i> FAQ</a></li>
            </ul>
        </nav>
        <h2>FeupTech</h2>
        <main class="general_container">  
            <section class="column">
                <form action="../actions/action_register.php" method="POST">
                        <div class="imgcontainer">
                            <img src='../images/profile.png' alt="Avatar" class="avatar">
                        </div>
                        
                        <div class="container" method="post">

                            <label for="username"><b>Username</b></label>
                            <input type="text" class="username" placeholder="username" name="username" required autofocus>
                            <i class="fas fa-user" style="margin-left: -40px;"></i>


                            <label for="name"><b>Name</b></label>
                            <input type="text" class="name" placeholder="name" name="name" required autofocus>
                            <i class="fas fa-pen" style="margin-left: -40px;"></i>

                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="password" id="password" name = "password" required autofocus>
                            <i class="fas fa-eye-slash" id="togglePassword" style="margin-left: -40px; cursor: pointer;"></i>


                            <label for="email"><b>Email</b></label>
                            <input type="email" placeholder="email" id="email" name ="email" required autofocus>
                            <i class="fas fa-at" style="margin-left: -40px;"></i>

                            
                            <button type="submit"><a style="text-decoration: none; color: #f1f1f1;" href="profile.html">Register</a></button>
                            <label>
                            <input type="checkbox" checked="checked" name="remember" style="background-color: #5A4ECE; cursor: pointer;" > Remember me
                            </label>
                            <br>
                            <a href="www.google.com" >Forgot your password?</a>    
                        </div>
    
                        <div class="container1">
                            <!-- <button type="button" class="cancelbtn">Cancel</button>  -->
                            <button class="cancelbtn"><a style="text-decoration: none; color: aliceblue;" href="login.html">cancel</a></button>
                            <span class="psw">Already have an account? <a href="login.html">Sign in</a></span>
                        </div>
                </form>
            </section>
        </main>
    </body>
    
    <script> 
    
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#psw');
    
      togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye');
    });
    </script>
    
    </html>
<?php } ?>