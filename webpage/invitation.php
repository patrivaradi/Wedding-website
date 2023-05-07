<!-- Invitation -->
<div class="invitation" id="invitation" >
    <?php if ($is_admin): ?>
    <button class="edit-button" id="rsvpButton" onclick="window.open('edit_invite.php','_self');">Edit invitation</button>
    <?php endif; ?>
    <?php
    $sql="SELECT * FROM `invitation` ORDER BY `invitation`.`id` DESC LIMIT 1;";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res)?>
        <img class="decor_img" src="../images/bg.jpg">
    <div class="invite-names"><?=$row['names']?></div>
    <p class="invite-text"><?=$row['text']?><br>
        <span class="invite-date"><?=date("jS \of M, Y",strtotime($row['date']))?></span><br>
    </p>
    <div class="countdown">
        <div><p id="days">00</p><span>Days</span></div>
        <div><p id="hours">00</p><span>Hours</span></div>
        <div><p id="minutes">00</p><span>Minutes</span></div>
        <div><p id="seconds">00</p><span>Seconds</span></div>
    </div>
    
    <a href="#rsvp-section" class="rsvp-jump">RSVP<span>⮟</span></a> 
</div>

<script>
    // -----------------Countdown-------------------------
    // Get the date from the invitation record in the database
    var countDownDate = new Date("<?php echo $row['date'] ?>").getTime();
    console.log(countDownDate);
    // Get the countdown elements
    var countDDays = document.getElementById("days");
    var countDHours = document.getElementById("hours");
    var countDMinutes = document.getElementById("minutes");
    var countDSeconds = document.getElementById("seconds");

    // Update the countdown every second
    var x = setInterval(function () {

        // Get the current date and time
        var now = new Date().getTime();

        // Calculate the distance between now and the countdown date
        var distance = countDownDate - now;

        // Calculate days, hours, minutes and seconds left
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours =Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the countdown values
        countDDays.innerHTML = days;
        countDHours.innerHTML = hours;
        countDMinutes.innerHTML = minutes;
        countDSeconds.innerHTML = seconds;

        // If the countdown is finished, display all zeros
        if (distance < 0) {
            clearInterval(x);
            countDDays.innerHTML = "00";
            countDHours.innerHTML = "00";
            countDMinutes.innerHTML = "00";
            countDSeconds.innerHTML = "00";
        }
    }, 1000);

</script>
<?php
}
?>
    <hr class="one" id="about-us-section"/>