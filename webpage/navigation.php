<?php
include('db_connection.php');
$sql="SELECT `theme` FROM `passwords` WHERE `name`='invited'";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
$row=mysqli_fetch_assoc($res)?>
<body class="<?=$row['theme']?>">
    <?php }
       ?> 
    <!-- Navigation bar -->
    <?php
    $sql="SELECT * FROM `invitation`";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res)?>
    <header id="home-section">
        <div class="navigation-bar">
        <div class="navbar">
            <a href="index.html" class="navbar-brand"><?=$row['names']?></a> 
            <?php } ?>
            <?php if ($is_admin): ?>
                <?php
                    $sql="SELECT `theme` FROM `passwords` WHERE `name`='invited'";
                    $res = mysqli_query($con,$sql);
                    if(mysqli_num_rows($res)>0){
                    $row=mysqli_fetch_assoc($res)?>
                <select id="choose-theme" onchange="Changecolor()">
                <option value="light-theme" <?= ($row['theme'] == 'light-theme') ? 'selected' : '' ?>>Light</option>
                <option value="dark-theme" <?= ($row['theme'] == 'dark-theme') ? 'selected' : '' ?>>Dark</option>
                <option value="pink-theme" <?= ($row['theme'] == 'pink-theme') ? 'selected' : '' ?>>Pink</option>
                <option value="orange-theme" <?= ($row['theme'] == 'orange-theme') ? 'selected' : '' ?>>Orange</option>
                <option value="blue-theme" <?= ($row['theme'] == 'blue-theme') ? 'selected' : '' ?>>Blue</option>
                <option value="green-theme" <?= ($row['theme'] == 'green-theme') ? 'selected' : '' ?>>Green</option>
                </select>
                <script>
                    function Changecolor() {
                        var ChosenTheme = document.getElementById("choose-theme").value;
                        localStorage.setItem('selectedTheme', ChosenTheme);

                        // Send selected theme to PHP file
                        $.ajax({
                            url: 'set_theme.php',
                            type: 'POST',
                            data: { chosenTheme: ChosenTheme },
                            success: function(response) {
                                // Set body classlist based on PHP response
                                document.body.className = response;
                            }
                        });
                    }
                    // Set the saved theme on page load
                    document.addEventListener("DOMContentLoaded", function(event) {
                        var savedTheme = localStorage.getItem('selectedTheme');
                        if (savedTheme) {
                        document.getElementById("choose-theme").value = savedTheme;
                        Changecolor();
                        }
                    });
                </script>
                <?php } ?> 
            <?php endif; ?>
            <ul class="nav-links">

                <li ><a href="#home-section" class="nav-link active">Home</a></li>
                <li ><a href="#about-us-section" class="nav-link">About Us</a></li>
                <li ><a href="#location-section" class="nav-link">Location</a></li>
                <li ><a href="#gallery-section" class="nav-link">Gallery</a></li>
                <li ><a href="#rsvp-section" class="nav-link">RSVP</a></li>
                <li ><a href="#footer-section" class="nav-link">Footer</a></li>
                <li ><a href="first.php" class="nav-link">Log out</a></li>
            </ul>
            <div class="toggle-button"><i class="fa-solid fa-bars"></i></div>
        </div>
        <div class="dropdown-menu">
            <li ><a href="#home-section" class="nav-link">Home</a></li>
            <li ><a href="#about-us-section" class="nav-link">About Us</a></li>
            <li ><a href="#location-section" class="nav-link">Location</a></li>
            <li ><a href="#gallery-section" class="nav-link">Gallery</a></li>
            <li ><a href="#rsvp-section" class="nav-link">RSVP</a></li>
            <li ><a href="#footer-section" class="nav-link">Footer</a></li>
            <li ><a href="first.php" class="nav-link">Log out</a></li>
        </div>
        </div>
    </header>
   
    <hr class="zero"/>