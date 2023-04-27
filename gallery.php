<?php include('db_connection.php'); ?>
   <!-- Gallery section -->
    <div  class="gallery-section">
    <!--Gallery Header-->
        <div class="gallery-header" id="myheader">
            <h1>Our Engagement</h1>
            <p>Some engagement pictures before our big day <br/> Change the grid by the buttons below</p>
            <button class="btn active" onclick="two()">2</button>
            <button class="btn active" onclick="four()">4</button>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <p><?php echo $_GET['error'];?></p>
        <?php endif ?>
        <form action="imgupload.php" method="post" enctype="multipart/form-data">
            <input id="uplimg" type="file" name="uplimg">
            <input id="uplsubmit" type="submit" name="submit" value="Upload">
        </form>
    <!--Photo grid-->
    <div class="row" >
    <?php
    $sql="SELECT * FROM `images` ORDER BY `id`";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        while($images=mysqli_fetch_assoc($res)){?>
                    
            <div class="column">
                <img src="uploads/<?=$images['image_url']?>" style="width: 100%;">
            </div>      
<?php }
       }?> 
        </div>
    </div>
    <hr class="four" id="rsvp-section" />