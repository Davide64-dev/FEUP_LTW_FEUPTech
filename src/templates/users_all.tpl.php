<?php function drawUsersAll($users) { ?>

<main class="tab">
            <section class="sidebar">
                <h3>Filters</h3>
                <label for="isUserFilter">idUser:</label>
                <input type="text" id="idUserFilter">
                <br>
                <label for="emailFilter">E-mail:</label>
                <input type="text" id="emailFilter">
                <br>
                <label for="nameFilter">Name:</label>
                <input type="text" id="nameFilter">
                <br>
                <label for="usernameFilter">Username:</label>
                <input type="text" id="usernameFilter">
            </section>
            
        <section class="table-container">
            <table id="filter">
                    <th>idUser</th>
                    <th>E-mail</th>
                    <th>Name</th>
                    <th>Username</th>
                </tr>
                <?php
                    foreach($users as $user)
                        drawUserAll($user);
                ?>
                <!-- Add more rows as needed -->
            </table>
        </section>    
    </main>
            <script>
                const idUserFilterInput = document.getElementById("idUserFilter");
                const emailFilterInput = document.getElementById("emailFilter");
                const nameFilterInput = document.getElementById("nameFilter");
                const usernameFilterInput = document.getElementById("usernameFilter");
                
                const table = document.getElementById("filter");
        
                idUserFilterInput.addEventListener("input", filterTable);
                emailFilterInput.addEventListener("input", filterTable);
                nameFilterInput.addEventListener("input", filterTable);
                usernameFilterInput.addEventListener("input", filterTable);
        
                function filterTable() {
                    const idUserFilter = idUserFilterInput.value.toUpperCase();
                    const emailFilter = emailFilterInput.value.toUpperCase();
                    const nameFilter = nameFilterInput.value.toUpperCase();
                    const usernameFilter = usernameFilterInput.value.toUpperCase();
                    
                const rows = table.getElementsByTagName("tr");
        
                for (let i = 1; i < rows.length; i++) {
                    const row = rows[i];
                    const cells = row.getElementsByTagName("td");
        
                    const idUser = cells[0].textContent.toUpperCase();
                    const email = cells[1].textContent.toUpperCase();
                    const name = cells[2].textContent.toUpperCase();
                    const username = cells[3].textContent.toUpperCase();
        
                    const idUserMatch = title.includes(idUserFilter);
                    const emailMatch = priority.includes(emailFilter);
                    const nameMatch = date.includes(nameFilter);
                    const usernameMatch = agent.includes(usernameFilter);
        
                    row.style.display = idUserMatch && emailMatch && nameMatch && usernameMatch ? "" : "none";
                }
            }
        </script>


</body>
</html>    

<?php } ?>

<?php function drawUserAll($user) { ?>
<tr>
    <td>
        <a href="../pages/profile_foreign.php?user=<?php echo urlencode($user->id) ?>">
            <?php echo $user->id ?> </a>
    </td>
    <td><?php echo $user->email ?></td>
    <td><?php echo $user->name ?></td>
    <td><?php echo $user->username ?></td>
</tr>
<?php } ?>