<?php function drawProfile(User $user, Session $session) { ?>
    <section>
                <h2>Welcome to your profile!</h2>
                <h3>Here you'll be able to keep track of your tickets and their status</h3>
                
                <button type = "button" class = "button" id="button"> 
                    <i class="fa-solid fa-plus fa-bounce"></i> 
                    Create new Ticket
                </button>
            
            </section>
        </nav>
        <main>
                <div id="info">
                    <img src = "../images/profile.png" alt = "profile" width = 100>
                    <button type = "button">Edit Profile</button>
                    <?php echo "<p>$user->name</p>" ?>
                </div>

                <section>
                    <a href = "tickets.html"></a>
                    <h2>Your Tickets</h2>
                </section>

                <aside>
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
                    <h2>Status</h2>
                    <p style = "font-weight: 600;">Open</p>
                    <p style="position: absolute; left: 71px; bottom: 100px">5</p>
                    <br>
                    <p style = "font-weight: 600;">Assigned</p>
                    <p style="position: absolute; right: 258px; bottom: 100px">2</p>
                    <br>
                    <p style = "font-weight: 600;">Closed</p>
                    <p style="position: absolute; right: 80px; bottom: 100px">3</p>   
                    <button type = "button">More info</button>
                </aside>
                <div class ="popup" id ="popup">
                    <form class="popup-content ">
                        <img src="../images/close.png" alt ="Close" class="close">
                            <p class="write">Write your ticket here</p><br>
                            <label for="Title"><b>Title</b></label>
                            <input type="text" id="title" name="title">
                            <p>Department</p>
                            <select name = "department">
                                <option value = "Finance">Finance</option>
                                <option value = "Repair">Repair</option>
                                <option value = "department1">department1</option>
                                <option value = "department2">department2</option>
                                <option value = "department3">department3</option>
                            </select>
                            <p>Priority</p>
                            <div class="two-column">
                                <div>
                                <input type="radio" id="high" name="priority" value="High">
                                <label for="high"> High</label>
                                </div>
                                <div>
                                <input type="radio" id="medium" name="priority" value="Medium">
                                <label for="medium">Medium</label>
                                </div>
                                <div>
                                <input type="radio" id="low" name="priority" value="Low">
                                <label for="low">Low</label>
                                </div>
                            </div>
                            <label for="New Ticket"><b>Description</b></label>
                            <textarea id = "answer" name = "answer" required autofocus></textarea>
                        <button type="button" class = "button_sub"><i class="far fa-paper-plane-top"></i> Submit ticket!</button>
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
    </script>

</html>

<?php } ?>