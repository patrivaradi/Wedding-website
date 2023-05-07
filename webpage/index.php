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


    <!--RSVP Section-->
    <div class="rsvp-section">
        <img class="decor_img" src="../images/bg.jpg">
        <?php if ($is_admin): ?>
        <button class="edit-button" id="rsvpButton" onclick="window.open('view_rsvp.php','_self');">View rsvps</button>
        <?php endif; ?>
        <h1 class="rsvp">HOPE YOU CAN MAKE IT!</h1>
        <p class="rsvp-text">Kindly responde by<br> <span class="invite-date">August, 2023</span></p>
        <button class="rsvp-button" id="rsvpButton" onclick="window.open('send.php','_self');">RSVP</button>
    </div>
<hr class="five" id="footer-section"/>

    <!-- Contact section -->

    <footer>
    <?php if (isset($_GET['error'])): ?>
    <p><?php echo $_GET['error'];?></p>
    <?php endif ?>
    <?php if ($is_admin): ?>
        <form action="ftrimgupload.php" method="post" enctype="multipart/form-data">
            <input id="uplimg" type="file" name="uplimg">
            <input id="uplsubmit" type="submit" name="submit" value="Upload">
        </form>
    <?php endif; ?>
    <?php
$sql="SELECT `id`, `image_url` FROM `images` WHERE `image_url` LIKE 'FOOTER%' ORDER BY `id` DESC LIMIT 1;";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    while($images=mysqli_fetch_assoc($res)){?>
        <img src="../uploads/footer-logo/<?=$images['image_url']?>" style="size:65px">
        <p>Website made by Varadi Patricia</p>
<?php }
       }?> 
    </footer>

    <script src="app.js"></script>
</body>
</html>