<?php

?>
<!-- About us section -->
<div class="about-us-container">
    <div class="about-us" >
        <?php
    $sql="SELECT * FROM `stories`";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res)?>
        <?php if ($is_admin): ?>
        <button class="edit-button" id="editButton" onclick="window.open('edit_about_us.php','_self');">Edit about us</button>
        <?php endif; ?>
        <div class="about-pic">
            <img src="../images/<?=$row['her_pic']?>" id="about-img-her" class="about-image active-pic" alt="Bride" onclick="test1()">
            <img src="../images/<?=$row['his_pic']?>" id="about-img-him" class="about-image" alt="Groom" onclick="test2()">
        </div>
        <div class="about-us-text">
            <div class="about-text active-text" id="about-her">           
                <h4>Her side of the story</h4>
                <p><?=$row['her_side']?></p>
            </div>
            <div class="about-text" id="about-him">            
                <h4>His side of the story</h4>
                <p><?=$row['his_side']?></p>            
            </div>
        </div>
        <?php }
       ?> 
    </div>
</div>
<hr class="two" id="location-section"/>