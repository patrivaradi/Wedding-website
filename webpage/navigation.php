<?php
include('db_connection.php');

?>
<body>
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
            <?php if ($is_admin): ?>
                <select id="choose-theme" onchange="Changecolor()">
                <option value="light-theme">Light</option>
                <option value="dark-theme">Dark</option>
                <option value="pink-theme">Pink</option>
                <option value="orange-theme">Orange</option>
                <option value="blue-theme">Blue</option>
                <option value="green-theme">Green</option>
                </select>
                <script>
                    function Changecolor() {
                        var ChosenTheme = document.getElementById("choose-theme").value;
                        var bodyElement = document.body;
                        var existingClasses = bodyElement.classList;

                        // Remove any existing theme class from body element
                        for (var i = 0; i < existingClasses.length; i++) {
                            if (existingClasses[i].includes("-theme")) {
                                bodyElement.classList.remove(existingClasses[i]);
                            }
                        }
                        
                        document.body.classList.add(ChosenTheme);
                        console.log(document.body.classList.toString());
                    }
                </script>
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
    <?php
}
?>
    <hr class="zero"/>