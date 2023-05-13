<?php function drawBegin(Session $session, User $agent) { ?>
    <section>
                <h2>Welcome to your departments!</h2>
    </section>
        </nav>
        <main class="mainprofile">
            <div id="info">
                <img src = "../images/profile.png" alt = "profile" width = "100">
                <br>
            </div>
            <div id="section">
                <section class="profile-section" style="display: none;">
                    <h2 style="color: white; font-size: xx-large; text-align:center;">Edit Profile</h2>
                </section>
<?php } ?>

<?php function drawEnd() { ?>
    </div> 
        </main>
</html>
    <?php } ?>

<?php function drawDepartment($department, $user, $db) { ?>
                    
    <section class="profile-section">

    <a href="../pages/tickets_all.php?department=<?php echo urlencode($department) ?>"><?php echo $department ?></a>
            <div id ="text">
                <p style = "font-weight: 600;">Nr. Tickets</p>
            </div>

            <div id="number">
                <p class="number"><?php echo $user->getNumberTicketsByDepartment($db, $department)?></p>
            </div>
                    
            <span id="dots"></span>
            <span id="more"></span>
            <button onclick="moreInfo()" id="btnInfo" type="button">More info</button>
    </section>
<?php } ?>