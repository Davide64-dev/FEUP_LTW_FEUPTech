<?php function drawTicketsHeader($session, $css = "") { ?>
    <!DOCTYPE html>
    <html lang = "en-Us">

    <head>
        <title>FeupTech</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale=1.0">
        <link href="../css/navLogin_style.css" rel="stylesheet">
        <link href="../css/tickets_style.css" rel="stylesheet">
        <link href="../css/newTicket.css" rel="stylesheet">
        <link href="../css/tickets_all.css" rel="stylesheet">
        <?php 
          echo $css;
        ?>

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
                <?php
                if (!$session->isLoggedIn()){
                    echo "<li class = \"nav-elem\"><a href=\"../pages/register.php\">Register</a></li>";
                    echo "<li class = \"nav-elem\"><a href=\"../pages/login.php\">Login</a></li>";
                }
                else{
                    echo "<li class = \"nav-elem\"><a href =\"../pages/profile.php\"><i class=\"fa-solid fa-user\"></i> Profile</a></li>";
                    echo "<form action=\"../actions/action_logout.php\" method=\"post\" class=\"logout\"><a href = \"#\" type=\"submit\" onclick=\"this.parentNode.submit(); return false;\">Logout</a></form>";
                }
                ?>
            </ul>
        </nav>


<?php } ?>

<?php function drawTickets($open, $assigned, $closed) { ?>
    <div class="box">
            <h2>Ticket Status</h2>
            <div class="row">
              <div class="property open">
                <h3>Open</h3>
                <?php
                  foreach($open as $ticket){
                    drawTicket($ticket);
                  }
                ?>
              </div>
              <div class="divider"></div>
              <div class="property assigned">
                <h3>Assigned</h3>
                <?php
                  foreach($assigned as $ticket){
                    drawTicket($ticket);
                  }
                ?>
              </div>
              <div class="divider"></div>
              <div class="property closed">
                <h3>Closed</h3>
                <?php
                  foreach($closed as $ticket){
                    drawTicket($ticket);
                  }
                ?>
              </div>
            </div>
        </div>
    </body> 
    <script>
                document.getElementById("button").addEventListener("click", function(){
            document.querySelector(".popup").style.display = "flex";
        })

        document.querySelector(".close").addEventListener("click",function(){
            document.querySelector(".popup").style.display = "none";
        })

        function openPopup(event) {
            event.preventDefault(); // Prevent the default behavior of the link

            // Display the popup
            document.querySelector(".popup").style.display = "flex";
        }

    </script>

</html>

<?php } ?>

<?php function drawTicket($ticket) { ?>
    <section class="ticket">
        <a href="profile.html" class="ticket-title" onclick="openPopup(event)"><?php echo $ticket->getTitle() ?></a>
        <p class="ticket-department"><?php echo $ticket->getDepartment() ?></p>
        <p class="ticket-assignment">
        <?php 
         $status = $ticket->getStatus();
  
            if ($status === 'Opened') {
              echo "<p>To be assigned</p>";
            } elseif ($status === 'Assigned') {
              $nameAgent = $ticket->getidAgent()->getName();
              echo "<p> Assigned by $nameAgent <p>";
            } elseif ($status === 'Closed') {
              $nameAgent = $ticket->getidAgent()->getName();
              echo "<p> Assigned by $nameAgent <p>";
            } 
        ?></p>
        <div class="ticket-container">
        <div class="ticket-priority">
         <?php 
            $priority = $ticket->getPriority();

            if ($priority === 'High') {
                      echo '<span class="high">' . $priority . '</span>';
                  } elseif ($priority === 'Medium') {
                      echo '<span class="medium">' . $priority . '</span>';
                  } elseif ($priority === 'Low') {
                      echo '<span class="low">' . $priority . '</span>';
                  } 
          ?>
        </div>
        <div class="ticket-hashtag">
            <span>#ticket123</span>
        </div>
        </div>
        </section>

<?php } ?>