<?php function drawProfile(User $user, Session $session, $open, $assigned, $closed, $departments) { ?>
    <section>
                <h2>Welcome to your profile!</h2>
                <h3>Here you'll be able to keep track of your tickets and their status</h3>
                
                <button type = "button" class = "button" id="button"> 
                    <i class="fa-solid fa-plus fa-bounce"></i> 
                    Create new Ticket
                </button>

            </section>
        </nav>
        <main class="mainprofile">
                <div id="info">
                    <img src = "../images/profile.png" alt = "profile" width = "100">
                    <button id="editProfileButton" type="button">Edit Profile</button>
                    <?php echo "<h3>$user->name</h3>" ?>
                    <br>
                    <?php echo "<p>@$user->username</p>" ?>
                </div>

            <div id="sections">
                <section class="profile-section" style="display: none;">
                <h2 style="color: white; font-size: xx-large; text-align:center;">Edit Profile</h2>


                <form id="editProfileForm" style="display: none;" action="../actions/action_editProfile.php" method = "post">
                    <label for="name">Name</label>
                    <input class="name" type="text" id="name" name="name" value="<?php echo $user->name; ?>"><br>
                    <br>
                    <label for="username">Username</label>
                    <input class="username" type="text" id="username" name="username" value="<?php echo $user->username; ?>"><br>
                    <br>
                    <label for="password">Password</label>
                    <input class="password" name ="password" type="password" id="psw" required autofocus>
                    <i class="fas fa-eye-slash" id="togglePassword" style="margin-left: -40px; cursor: pointer; color: black;"></i>
                    <br>
                    <label for="email">Email</label>
                    <input class="email" type="email" id="email" name="email" value="<?php echo $user->email; ?>"><br>

                    <button type="submit">Save</button>
                </form>


                </section>
                <section class="ticket-section">
                    <?php
                    if ($user instanceof Admin){
                        echo "<img src=\"../images/admin_badge.png\" alt =\"Badge of admin\">";
                    }
                    elseif($user instanceof Agent){
                        echo "<img src=\"../images/agent_badge.png\" alt =\"Badge of agent\">";
                    }
                    else{
                        echo "<img src=\"../images/client_badge.png\" alt =\"Badge of client\">";
                    }
                    ?>

                    <a href="../pages/tickets.php">Status</a>
                    <div id ="text">
                        <p style = "font-weight: 600;">Open</p>
                        <p style = "font-weight: 600;">Assigned</p>
                        <p style = "font-weight: 600;">Closed</p>
                    </div>

                    <div id="number">
                        <p class="number"><?php echo $open?></p>
                        <p class="number"><?php echo $assigned?></p>
                        <p class="number"><?php echo $closed?></p>   
                    </div>
                    
                    <span id="dots"></span>
                    <span id="more">
                        
                    <?php    
                        if($user instanceof Admin || $user instanceof Agent){
                            echo "<h2>Tickets assigned <span class=\"assigned\">$assigned</span></h2>";
                        } 

                    ?>
                    </span>
                    <?php
                        if($user instanceof Agent){
                            echo '<a href="../pages/departments.php"><button onclick="moreInfo()" id="btnInfo" type="button">More info</button></a>';
                        }
                        else{
                            echo "<button onclick=\"moreInfo()\" id=\"btnInfo\" type=\"button\">More info</button>"; 
                        }
                    ?>
                </section>
                    
            </div>
                <div class ="popup" id ="popup">
                    <form action="../actions/action_addTicket.php" method = "post"class="popup-content ">
                        <input class="email" placeholder="email" name="email" type = "hidden" value="<?php echo $user->getEmail(); ?>">

                        <img src="../images/close.png" alt ="Close" class="close">
                            <p class="write">Write your ticket here</p><br>

                            <label for="Title"><b>Title</b></label>
                            <input type="text" id="title" name="title">

                            <p>Department</p>
                            <select name = "department">
                                <?php
                                foreach ($departments as $department)
                                    echo "<option value =\"$department\">$department</option>";
                                ?>
                            </select>
                            <p>Priority</p>
                            <div class="two-column" class = "priority">
                                <div>
                                <input type="radio" id="high" name="priority" value="High">
                                <label for="high"> High</label>
                                </div>
                                <div>
                                <input type="radio" id="medium" name="priority" value="Medium">
                                <label for="medium">Medium</label>
                                </div>
                                <div>
                                <input type="radio" id="low" name="priority" value="Low" checked>
                                <label for="low">Low</label>
                                </div>
                            </div>
                            <label for="New Ticket"><b>Description</b></label>
                            <textarea class = "description" id = "description" name = "description" name = "description" required autofocus></textarea>
                        <button type="submit" class = "button_sub"><i class="far fa-paper-plane-top"></i> Submit ticket!</button>
                    </form>
                </div>
        </main>

    </body>
    <script>
        
        document.getElementById("button").addEventListener("click", function(){
            document.querySelector(".popup").style.display = "flex";
        })

        document.querySelector(".close").addEventListener("click",function(){
            document.querySelector(".popup").style.display = "none";
        })
        
        function moreInfo() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("btnInfo");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "More info"; 
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Show less"; 
                moreText.style.display = "inline";
            }
        }

        document.querySelector("#info button").addEventListener("click", function() {
            var profileSection = document.querySelector(".profile-section");
            if (profileSection.style.display === "none") {
                profileSection.style.display = "block";
            } else {
                profileSection.style.display = "none";
            }
        });

        document.getElementById("editProfileButton").addEventListener("click", function() {
    var profileForm = document.getElementById("editProfileForm");
    if (profileForm.style.display === "none") {
        profileForm.style.display = "block";
    } else {
        profileForm.style.display = "none";
    }
});

 
/*
document.getElementById("editProfileForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Fetch the form data
    var formData = new FormData(this);

    // Send the form data to the server using an AJAX request
    fetch("../actions/action_editProfile.php", {
        method: "POST",
        body: formData
    })
    .then(function(response) {
        if (response.ok) {
            // Profile updated successfully, you can show a success message or reload the page
            alert("Profile updated successfully!");
            location.reload();
        } else {
            // Handle error response from the server
            alert("Failed to update profile. Please try again.");
        }
    })
    .catch(function(error) {
        // Handle network error or other exceptions
        alert("An error occurred. Please try again later.");
        console.error(error);
    });
});

*/

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