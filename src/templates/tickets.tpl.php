<?php function drawTicketsHeader($session) { ?>
    <!DOCTYPE html>
    <html lang = "en-Us">

    <head>
        <title>FeupTech</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale=1.0">
        <link href="../css/navLogin_style.css" rel="stylesheet">
        <link href="../css/tickets_style.css" rel="stylesheet">
        <link href="../css/newTicket.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
        <script src="https://kit.fontawesome.com/38229b6c34.js" crossorigin="anonymous"></script>
    </head>

    <body>
        
        <nav>
            <ul class = "navigation">
                <li class = "nav_elem"><a href = "inquiries.html"><i class="fa-solid fa-list-check"></i> Inquiries</a></li>
                <li class = "nav_elem"><a href = "contacts.html"><i class="fa-solid fa-address-book"></i> Contacts</a></li>
                <li class = "nav_elem"><a href = "about.html"><i class="fas fa-circle-info"></i> About Us</a></li>
                <li class = "nav_elem"><a href = "faq.html"><i class="fa-solid fa-question"></i> FAQ</a></li>
                <li class = "nav_elem"><a href = "profile.html"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </nav>


<?php } ?>

<?php function drawTickets($open, $assigned, $closed) { ?>
    <div class="box">
            <h2>Ticket Status</h2>
            <div class="row">
              <div class="property open">
                <h3>Open</h3>
                <section class="ticket">
                  <a href="profile.html" class="ticket-title" onclick="openPopup(event)">Ticket #1</a>
                  <p class="ticket-department">Accounting</p>
                  <p class="ticket-assignment">To be assigned</p>
                  <div class="ticket-container">
                    <div class="ticket-priority">
                      <span class="high">High</span>
                    </div>
                    <div class="ticket-hashtag">
                      <span>#ticket123</span>
                    </div>
                  </div>
                </section>
              </div>
              <div class="divider"></div>
              <div class="property assigned">
                <h3>Assigned</h3>
                <section class="ticket">
                  <a href="profile.html" class="ticket-title" onclick="openPopup(event)">Ticket #2</a>
                  <p class="ticket-department">Accounting</p>
                  <p class="ticket-assignment">Person1</p>
                  <div class="ticket-container">
                    <div class="ticket-priority">
                      <span class="medium">Medium</span>
                    </div>
                    <div class="ticket-hashtag">
                      <span>#ticket123</span>
                    </div>
                  </div>
                </section>
              </div>
              <div class="divider"></div>
              <div class="property closed">
                <h3>Closed</h3>
                <section class="ticket">
                  <a href="profile.html" class="ticket-title" onclick="openPopup(event)">Ticket #3</a>
                  <p class="ticket-department">Department1</p>
                  <p class="ticket-assignment">Person1</p>
                  <div class="ticket-container">
                    <div class="ticket-priority">
                      <span class="low">Low</span>
                    </div>
                    <div class="ticket-hashtag">
                      <span>#ticket123</span>
                    </div>
                  </div>
                </section>
                <section class="ticket">
                  <a href="profile.html" class="ticket-title" onclick="openPopup(event)">Ticket #4</a>
                  <p class="ticket-department">Department2</p>
                  <p class="ticket-assignment">Person2</p>
                  <div class="ticket-container">
                    <div class="ticket-priority">
                      <span class="high">High</span>
                    </div>
                    <div class="ticket-hashtag">
                      <span>#ticket123</span>
                    </div>
                  </div>
                </section>
                
              </div>
            </div>
        </div>



<?php } ?>

<?php function drawTicket($ticket) { ?>

    <section class="ticket">
        <a href="profile.html" class="ticket-title" onclick="openPopup(event)"><?php $ticket->getTitle() ?></a>
        <p class="ticket-department"><?php $ticket->getDepartment() ?></p>
        <p class="ticket-assignment"><?php $ticket->getStatus() ?></p>
        <div class="ticket-container">
        <div class="ticket-priority">
            <span class="high"><?php $ticket->getPriority() ?></span>
        </div>
        <div class="ticket-hashtag">
            <span>#ticket123</span>
        </div>
        </div>
        </section>

<?php } ?>