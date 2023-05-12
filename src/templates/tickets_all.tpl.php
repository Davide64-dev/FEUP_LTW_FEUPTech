<?php function drawTicketsAll($tickets) { ?>

    <main class="tab">
                <section class="sidebar">
                    <h3>Filters</h3>
                    <label for="titleFilter">Title:</label>
                    <input type="text" id="titleFilter">
                    <br>
                    <label for="priorityFilter">Priority:</label>
                    <input type="text" id="priorityFilter">
                    <br>
                    <label for="dateFilter">Date:</label>
                    <input type="text" id="dateFilter">
                    <br>
                    <label for="agentFilter">Agent:</label>
                    <input type="text" id="agentFilter">
                    <br>
                    <label for="statusFilter">Status:</label>
                    <input type="text" id="statusFilter">
                    <br>
                    <label for="hashtagFilter">Hashtag:</label>
                    <input type="text" id="hashtagFilter">
                </section>
                
            <section class="table-container">
                <table id="filter">
                    <tr>
                        <th>Title</th>
                        <th>Priority</th>
                        <th>Date</th>
                        <th>Agent</th>
                        <th>Status</th>
                        <th>Hashtag</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Task 1</td>
                        <td>High</td>
                        <td>2023-05-12</td>
                        <td><i class="fa-solid fa-plus"></i></td>
                        <td>In Progress</td>
                        <td>#important</td>
                        <td><i class="fa-solid fa-pencil"></i></td>
                    </tr>
                     <tr>
                        <td>Task 1</td>
                        <td>Low</td>
                        <td>2023-05-12</td>
                        <td><i class="fa-solid fa-plus"></i></td>
                        <td>In Progress</td>
                        <td>#important</td>
                        <td><i class="fa-solid fa-pencil"></i></td>
                    </tr>
                    <tr>
                        <td>Task 2</td>
                        <td>Medium</td>
                        <td>2023-05-15</td>
                        <td><i class="fa-solid fa-plus"></i></td>
                        <td>Completed</td>
                        <td>#urgent</td>
                        <td><i class="fa-solid fa-pencil"></i></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </table>
            </section>    
        </main>
                <script>
                    const titleFilterInput = document.getElementById("titleFilter");
                    const priorityFilterInput = document.getElementById("priorityFilter");
                    const dateFilterInput = document.getElementById("dateFilter");
                    const agentFilterInput = document.getElementById("agentFilter");
                    const statusFilterInput = document.getElementById("statusFilter");
                    const hashtagFilterInput = document.getElementById("hashtagFilter");
                    
                    const table = document.getElementById("filter");
            
                    titleFilterInput.addEventListener("input", filterTable);
                    priorityFilterInput.addEventListener("input", filterTable);
                    dateFilterInput.addEventListener("input", filterTable);
                    agentFilterInput.addEventListener("input", filterTable);
                    statusFilterInput.addEventListener("input", filterTable);
                    hashtagFilterInput.addEventListener("input", filterTable);
            
                    function filterTable() {
                        const titleFilter = titleFilterInput.value.toUpperCase();
                        const priorityFilter = priorityFilterInput.value.toUpperCase();
                        const dateFilter = dateFilterInput.value.toUpperCase();
                        const agentFilter = agentFilterInput.value.toUpperCase();
                        const statusFilter = statusFilterInput.value.toUpperCase();
                        const hashtagFilter = hashtagFilterInput.value.toUpperCase();
                        
                    const rows = table.getElementsByTagName("tr");
            
                    for (let i = 1; i < rows.length; i++) {
                        const row = rows[i];
                        const cells = row.getElementsByTagName("td");
            
                        const title = cells[0].textContent.toUpperCase();
                        const priority = cells[1].textContent.toUpperCase();
                        const date = cells[2].textContent.toUpperCase();
                        const agent = cells[3].textContent.toUpperCase();
                        const status = cells[4].textContent.toUpperCase();
                        const hashtag = cells[5].textContent.toUpperCase();
            
                        const titleMatch = title.includes(titleFilter);
                        const priorityMatch = priority.includes(priorityFilter);
                        const dateMatch = date.includes(dateFilter);
                        const agentMatch = agent.includes(agentFilter);
                        const statusMatch = status.includes(statusFilter);
                        const hashtagMatch = hashtag.includes(hashtagFilter);
            
                        row.style.display = titleMatch && priorityMatch && dateMatch && agentMatch && statusMatch && hashtagMatch ? "" : "none";
                    }
                }
            </script>


    </body>
</html>    




<?php } ?>