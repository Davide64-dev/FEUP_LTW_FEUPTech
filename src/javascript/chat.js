
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

var ticketValue = "<?php echo $ticket->idTicket; ?>";

window.location.replace('../actions/action_insert_message.php?idTicket=' + ticketValue + '&content=' + message);
}
