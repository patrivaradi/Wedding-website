<?php
include('header.php');
include('db_connection.php');
$sql="SELECT `theme` FROM `passwords` WHERE `name`='invited'";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res)?>
<body class="<?=$row['theme']?>">
<?php }
    ?> 
<div class="bg-modal">
    <div class="modal-contents" style=" overflow-y:scroll;">
        <form id="input-form">
            <div class="form-about" style="height:auto;">
                <div id="result"></div>
                <div class="close" onclick="window.open('index.php','_self');">+</div>

                <label>Time</label>
                <input id="edit-loc-time" name="loc-time" type="text" placeholder="write here the time of your event">

                <label>Where</label>
                <textarea id="edit-loc-where" name="loc-where" type="text" placeholder="write here the location of your event" style="width: -webkit-fill-available;height: 50px;"></textarea>
                
                <label>Where maps url</label>
                <input id="edit-loc-where-map" name="loc-where-map" type="text" placeholder="insert the location url here">
                
                <label>Dress code</label>
                <input id="edit-loc-dress" name="loc-dress" type="text" placeholder="write your dress code here">

                <label>Parking</label>
                <input id="edit-loc-park" name="loc-park" type="text" placeholder="write the parking situation here">

                <label>Details</label>
                <textarea id="edit-loc-det" name="loc-det" type="text" placeholder="Additional details" style="width: -webkit-fill-available;height: 50px;"></textarea>
                

                <button class="rsvp-button" id="submit-button" type="submit" >Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    //-----------Insert edit <form> in database-------------------

$("#submit-button").on("click", function (e) {
  e.preventDefault(); // prevent default form submission behavior
    $.ajax({
        type: "POST",
        url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/editlocation.php",
        data: $("#input-form").serialize(),
        success: function (response) {
        $("#result").text("Succes");
        $(".bg-modal").hide();
        window.location.href = "index.php";
        alert("Thank you!");
        },
    });
});

</script>