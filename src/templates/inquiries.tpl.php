<?php function drawInquiries($inquiries, $ticket, $user){ ?>

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