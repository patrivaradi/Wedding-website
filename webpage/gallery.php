<!-- Gallery section -->
<div  class="gallery-section">
<!--Gallery Header-->
<?php if (isset($_GET['error'])): ?>
        <p><?php echo $_GET['error'];?></p>
    <?php endif ?>
    <?php if ($is_admin): ?>
    <form action="imgupload.php" method="post" enctype="multipart/form-data">
        <input id="uplimg" type="file" name="uplimg">
        <input id="uplsubmit" type="submit" name="submit" value="Upload">
    </form>
    <?php endif; ?>
    <div class="gallery-header" id="myheader">
        <h1>Our Engagement</h1>
        <p>Some engagement pictures before our big day <br/> Change the grid by the buttons below</p>
        <button class="btn active" onclick="two()">2</button>
        <button class="btn active" onclick="four()">4</button>
    </div>

    
<!--Photo grid-->
<div class="row" >
<?php
$sql="SELECT * FROM `images` ORDER BY `id`";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    while($images=mysqli_fetch_assoc($res)){?>
                
        <div class="column">
            <img src="../uploads/<?=$images['image_url']?>" style="width: 100%;">
            <?php if ($is_admin): ?>
            <form class="delete_img" action="delete_image.php" method="post">
                <input type="hidden" name="image_id" value="<?=$images['id']?>">
                <input id="delete-button" type="submit" name="delete" value="Delete">
            </form>
            <?php endif; ?>
        </div>      
<?php }
       }?> 
    </div>
</div>
<hr class="four" id="rsvp-section" />