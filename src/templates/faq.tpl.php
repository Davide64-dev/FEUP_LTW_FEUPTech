<?php function drawFAQ() { ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <title>FEUPTech</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale=1.0">
    <link href="../css/nav_style.css" rel="stylesheet">
    <link href="../css/faq_style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <script src="https://kit.fontawesome.com/38229b6c34.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <ul class = "navigation">
            <li class = "nav_elem"><a href = "inquiries.html"><i class="fa-solid fa-list-check"></i> Inquiries</a></li>
            <li class = "nav_elem"><a href = "../pages/contacts.php"><i class="fa-solid fa-address-book"></i> Contacts</a></li>
            <li class = "nav_elem"><a href = "../pages/about_us.php"><i class="fas fa-circle-info"></i> About Us</a></li>
            <li class = "nav_elem"><a href = "../pages/faq.php"><i class="fa-solid fa-question"></i> FAQ</a></li>
            <li class = "nav_elem"><a href = "../pages/profile.php"><i class="fa-solid fa-user"></i></a></li>
        </ul>
        <section>
            <h2>Frequently Asked Questions - FAQ</h2>
            <h3>Here you'll be able to clarify any doubts you may have!</h3>
        
        </section>
    </nav>
    <main>
        <h2>Categories</h2>  
        <ul id="categories">
            <li class="btn pressed" role = "button" onclick="filterSelection('all')"><span class="text"> Show all</span></li>
            <li class="btn" role = "button" onclick="filterSelection('tickets')"><span class="text"> Tickets</span></li>
            <li class="btn" role = "button" onclick="filterSelection('departments')"><span class="text"> Departments</span></li>
            <li class="btn" role = "button" onclick="filterSelection('roles')"><span class="text"> User Roles</span></li>
        </ul> 
        
        <h2>Questions</h2>  
        <section class="faq-container">
            <div class="filterDiv tickets">

                <!-- faq question -->
                <h1 id="tickets" class="faq-page">What is a trouble ticket?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p> A trouble ticket, also known as a support ticket or help desk ticket, is a record of a customer or user's request for assistance or support with a particular issue or problem. It typically includes details such as the user's name and contact information, the nature of the issue or problem, and any relevant supporting information.
                        The trouble ticket serves as a communication channel between the user and the support team, allowing the team to track and manage the request until it is resolved. It also provides a history of the issue, including any actions taken and the resolution provided, which can be helpful for future reference.
                      </p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="filterDiv departments">

                <!-- faq question -->
                <h1 id="departments" class="faq-page">How do I know which department to submit my trouble ticket to?</h1>

                <!-- faq answer -->

                <div class="faq-body">
                    <p> Knowing which department to submit your trouble ticket to is important because it can help ensure that your issue is handled by the team that is best equipped to resolve it. Here are some tips for determining which department to submit your ticket to:
                        <br>
                        <br>
                        1. Check the website or documentation: If you're not sure which department to contact, check the organization's website or documentation. They may have a support section that outlines the different departments and the types of issues they handle.
                        <br>
                        <br>
                        2.Review previous communication: If you've had a similar issue in the past, review any previous communication you've had with the support team to see which department handled it.
                        <br>
                        <br>
                        3.Consider the nature of the issue: Think about the nature of your issue and which department would be most knowledgeable about it. For example, if you're having a technical issue with a product, you may want to submit your ticket to the technical support department.
                        <br>
                        <br>
                        4.Contact customer support: If you're still not sure which department to contact, reach out to the customer support team. They can help guide you to the appropriate department based on the nature of your issue.
                        <br>
                        <br>
                        By taking these steps, you can increase the chances that your trouble ticket is directed to the right department and resolved in a timely manner.
                      </p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="filterDiv roles">

                <!-- faq question -->
                <h1 id="roles" class="faq-page">What actions can an administrator user take in a trouble ticket system?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>-Upgrade a client to an agent or an admin.
                        <br>
                        -Add new departments, statuses, and other relevant entities.
                        <br>
                        -Assign agents to departments.
                        <br>
                        -Control the whole system.
                    </p>
                </div>
            </div>

        </section>
    </main>
</body>
<script>
    var faq = document.getElementsByClassName("faq-page");
var i;
for (i = 0; i < faq.length; i++) {
    faq[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");
        /* Toggle between hiding and showing the active panel */
        var body = this.nextElementSibling;
        if (body.style.display === "block") {
            body.style.display = "none";
        } else {
            body.style.display = "block";
        }
    });
}


filterSelection("all")
    function filterSelection(c) {
      var x, i;
      x = document.getElementsByClassName("filterDiv");
      if (c == "all") c = "";
      for (i = 0; i < x.length; i++) {
        RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) AddClass(x[i], "show");
      }
    }
    
    function AddClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
      }
    }
    
    function RemoveClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
          arr1.splice(arr1.indexOf(arr2[i]), 1);     
        }
      }
      element.className = arr1.join(" ");
    }
    
    // Add pressed class to the current button (highlight it)
    var btnContainer = document.getElementById("categories");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function(){
        var current = document.getElementsByClassName("pressed");
        current[0].className = current[0].className.replace(" pressed", "");
        this.className += " pressed";
      });
    }
</script>

</html>

<?php } ?>