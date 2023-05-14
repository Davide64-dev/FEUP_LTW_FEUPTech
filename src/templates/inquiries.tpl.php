<?php function drawInquiries($inquiries){ ?>

    <main class = inquiries>
            <section class="clients">
                <h3>Inquiries</h3>
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Clients..">
                    <i style="position: relative; left: 4%; top: -7%" class="fa fa-magnifying-glass"></i>
                <ul id="myUL">
                    <li>
                        <a href="#">Adele</a>
                        <p>I needed some help with...</p>
                    </li>
                    <li>
                        <a href="#">Sarah</a>
                        <p>I needed some help with...</p>
                    </li>

                </ul>
            </section>
            <section class="chat">
                <section class="container">
                    <h2>Client Chat</h2>
                    <div id="message-container">
                        <?php

                            foreach ($inquiries as $inquirie)
                                echo "<div class=\"message user-message\">$inquirie->content</div>"
                        ?>
                    </div>
                </section>
                <input type="text" id="chat-input" placeholder="Write your message" title="Type in a message">
            </section>
        </main>
        <script>
            function myFunction() {
                var input, filter, ul, li, a, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                ul = document.getElementById("myUL");
                li = ul.getElementsByTagName("li");
                for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("a")[0];
                    txtValue = a.textContent || a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }

            const chatInput = document.getElementById("chat-input");
            const messageContainer = document.getElementById("message-container");

            chatInput.addEventListener("keyup", function (event) {
                if (event.keyCode === 13) {
                    const message = chatInput.value.trim();
                    if (message !== "") {
                        addMessage(message, true);
                        chatInput.value = "";
                    }
                }
            });

            function addMessage(message, isUser) {
                const messageElement = document.createElement("div");
                messageElement.classList.add("message");
                messageElement.textContent = message;

                if (isUser) {
                    messageElement.classList.add("user-message");
                } else {
                    messageElement.classList.add("received-message");
                }

                messageContainer.appendChild(messageElement);
                messageContainer.scrollTop = messageContainer.scrollHeight;
            }
            </script>
            
    </body>
</html>




<?php } ?>