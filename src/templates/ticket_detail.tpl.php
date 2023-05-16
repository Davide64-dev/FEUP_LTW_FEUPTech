<?php function drawTicketDetail($db,Ticket $ticket, User $user) {
    $client = User::getUserWithId($db, $ticket->idClient);
    $agents = $user->getAllAgentsByDepartment($db, $ticket->department, $client);
    $name = "";
    if ($client) {
        $name = $client->getName();
    } else {
        $name = "Unknown User";
    }
    ?>
    <h1 class="details">Ticket details</h1>

        <main class = "all">
            <section class="box">
                <div class="content">
                    <h1 class="title"><?php echo $ticket->title ?></h1>
                    <div class ="try">
                        <h3 class="author"><?php echo $name?></h3>
                        <p class="date"><?php echo $ticket->date ?></p>
                    </div>
                </div>
                <p class="description"><?php echo $ticket->description ?></p>
                <div class = "end">
                    <p class="ticket-priority"><?php
                    
                    $priority = $ticket->getPriority();

                    if ($priority === 'High') {
                              echo '<span class="high">' . $priority . '</span>';
                          } elseif ($priority === 'Medium') {
                              echo '<span class="medium">' . $priority . '</span>';
                          } elseif ($priority === 'Low') {
                              echo '<span class="low">' . $priority . '</span>';
                          } 
                          ?></p>
                    <div class = "hashtags">
                        <p class="hashtag">#hashtag</p>
                        <p class="hashtag">#hashtag</p>
                        <!--Tamanho altera automaticamente ao serem acrescentadas mais hashtags-->
                    </div>    
                </div>
            </section>

            <section class="assign">
            <?php 
            if ($user->id !== $client->id){
                echo '<button class="button-assign role="button" id="button">Assign</button>';
            }
            ?>
            <br>
                <a href="../pages/inquiries.php?ticket=<?php echo urlencode($ticket->idTicket) ?>"><button class="button-assign" role="button">Inquiries</button></a>
            </section>


            <div class ="popup-assign" id ="popup-assign">
                    <form action="../actions/action_assignTicket.php" method = "post" class="popup-content-assign">
                        <img src="../images/close.png" alt ="Close" class="close">
                        <h2 class="write">Assign the ticket here</h2><br>
                        <div class="two-column-assign">
                        <?php foreach($agents as $agent) { ?>
                            <div>
                                <input type="radio" id="agentName" name="agent" value="name">
                                <label for="agentName"> <?php echo User::getUserWithId($db, $agent)->getName()?>
                                </label>
                            </div>
                            <?php } ?>
                        
                        </div>
                        <button type="submit" class = "button_sub-assign"><i class="far fa-paper-plane-top"></i> Assign!</button>
                    </form>
                </div>
        </main>

    </body>

    <script>
         
         document.getElementById("button").addEventListener("click", function(){
            document.querySelector(".popup-assign").style.display = "flex";
        })

        document.querySelector(".close").addEventListener("click",function(){
            document.querySelector(".popup-assign").style.display = "none";
        })
        
    </script>
</html>
        





<?php } ?>
