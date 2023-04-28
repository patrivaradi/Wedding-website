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