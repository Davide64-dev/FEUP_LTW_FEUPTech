<?php function drawTicketDetail(Ticket $ticket, User $user) { ?>
    <h1 class="details">Ticket details</h1>

        <main class = "all">
            <section class="box">
                <div class="content">
                    <h1 class="title"><?php echo $ticket->title ?></h1>
                    <div class ="try">
                        <h3 class="author">user</h3>
                        <p class="date"><?php echo $ticket->date ?></p>
                    </div>
                </div>
                <p class="description"><?php echo $ticket->description ?></p>
                <div class = "end">
                    <p class="priority"><?php echo $ticket->priority ?></p>
                    <div class = "hashtags">
                        <p class="hashtag">#hashtag</p>
                        <p class="hashtag">#hashtag</p>
                        <!--Tamanho altera automaticamente ao serem acrescentadas mais hashtags-->
                    </div>    
                </div>
            </section>

            <section class="assign">
                <button class="button-assign" role="button">Assign</button>
                <br>
                <button class="button-assign" role="button">Start an inquiry</button>
            </section>
        </main>

    </body>
</html>
        





<?php } ?>
