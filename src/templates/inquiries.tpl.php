<?php function drawInquiries($inquiries, $ticket, $user, $changes){ ?>

    <aside class = "changes">
        <?php
            foreach($changes as $change)
                drawChange($change)
        ?>
    </aside>

    <main class = inquiries>
            <section class="clients">

            <?php
                if($user->id == $ticket->idAgent)
                    echo "<a href = \"../actions/action_closeTicket.php?ticket=" . urlencode($ticket->idTicket) . "\"><button>Close</button></a>";
            ?>
            </section>
            <section class="chat">
                <section class="container">
                    <h2>Client Chat</h2>
                    <div id="message-container">
                        
                        <?php
                            
                            echo "<div class=\"message agent-message\">Ticket n. $ticket->idTicket</div>";

                            foreach ($inquiries as $inquirie)
                                if ($inquirie->idUser === $user->id)
                                    echo "<div class=\"message user-message\">$inquirie->content</div>";
                                else
                                    echo "<div class=\"message agent-message\">$inquirie->content</div>"
                        ?>
                    </div>
                </section>
                <input type="text" id="chat-input" placeholder="Write your message" title="Type in a message" autofocus>
            </section>
        </main>
            
    </body>
</html>


<?php } ?>

<?php function drawChange($change){ ?>

    <section class = "change">
        <h3 class = "change_type">
            <?php
                if ($change instanceof HashTagChange)
                    echo "HashTag Change";
                else if ($change instanceof DepartmentChange)
                    echo "Department Change";
                else if ($change instanceof DescriptionChange)
                    echo "Description Change";
                else 
                    echo "Agent Change"
            ?>
        </h3>
        <p class = "change_info">
        <?php
                if ($change instanceof HashTagChange)
                    echo "Old hashtag: $change->oldHashtag";
                else if ($change instanceof DepartmentChange)
                    echo "Old Department: $change->oldDepartment";
                else if ($change instanceof DescriptionChange)
                    echo "Old Description: $change->oldDescription";
                else 
                    echo "Old Agent: $change->oldAgent"
            ?>
        </p>
        <p class = "change_info">
            <?php
                echo $change->date;
            ?>
        </p>
    </section>

<?php } ?>