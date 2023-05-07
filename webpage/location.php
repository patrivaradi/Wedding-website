<!-- Location section -->
<div class="location-container">
    <img class="decor2_img" src="../images/bg.jpg">
    <?php if ($is_admin): ?>
    <button class="edit-button" id="editButton" onclick="window.open('edit_location.php','_self');">Edit event details</button>
    <?php endif; ?>
    <div class="location-heading">
        <p>Weekend Events</p>
    </div>
    <?php
    $sql="SELECT * FROM `location` ORDER BY `location`.`id` DESC LIMIT 1;";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res)?>
    <div class="location" >
        
        <div class="row">
            <div class="col-sm-4" id="details"><h6>Time</h6></div>
            <div class="col-sm-8" id="specifics"><p><?=$row['time']?></p></div>
        </div>
        <div class="row">
            <div class="col-sm-4" id="details"><h6>Where</h6></div>
            <div class="col-sm-8" id="specifics">
                <p><?=$row['location']?></p>
                <a href="<?=$row['location-url']?>">>Map<</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" id="details"><h6>Dress</h6></div>
            <div class="col-sm-8" id="specifics"><p><?=$row['dress']?></p></div>
        </div>
        <div class="row">
            <div class="col-sm-4" id="details"><h6>Parking</h6></div>
            <div class="col-sm-8" id="specifics"><p><?=$row['park']?></p></div>
        </div>
        <div class="row">
            <div class="col-sm-4" id="details"><h6>Details</h6></div>
            <div class="col-sm-8" id="specifics"><p><?=$row['details']?></p></div>
        </div>
    </div>
     <?php }
       ?> 
</div>
<hr class="three" id="gallery-section"/>