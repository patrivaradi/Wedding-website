<?php
session_start();
include('db_connection.php');
// Check if the user is logged in as an admin
$is_admin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $query = "SELECT `pass` FROM `passwords` WHERE `name`='admin'";
    $result = $con->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $password = $row['pass'];
        if ($_SESSION['password'] === $password) {
            $is_admin = true;
        }
    }
}
include('header.php');
include('navigation.php');
include('invitation.php');
include('about_us.php');
include('location.php');
include('gallery.php');
?>

    
<!-- <script src="confetti.js" type="module"></script> -->
    <!--RSVP Section-->
    <div class="rsvp-section">
        <h1 class="rsvp">HOPE YOU CAN MAKE IT!</h1>
        <p class="rsvp-text">Kindly responde by<br> <span class="invite-date">August, 2023</span></p>
        <button class="rsvp-button" id="rsvpButton" onclick="window.open('send.php','_self');">RSVP</button>
    </div>
<hr class="five" id="footer-section"/>
    <!-- Contact section -->
    <footer>
        <img src="./images/logo.png" style="size:65px">
        <p>Website made by Varadi Patricia</p>

    </footer>

    <script src="app.js"></script>
</body>
</html>