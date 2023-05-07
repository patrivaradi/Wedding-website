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
                <div class="close" onclick="window.open('index.php#location-section','_self');">+</div>

                <label>Time</label>
                <input id="edit-loc-time" name="loc-time" type="text" placeholder="write here the time of your event">
                <div class="error-hint" id="time-error"></div>

                <label>Where</label>
                <textarea id="edit-loc-where" name="loc-where" type="text" placeholder="write here the location of your event" style="width: -webkit-fill-available;height: 50px;"></textarea>
                <div class="error-hint" id="where-error"></div>

                <label>Where maps url</label>
                <input id="edit-loc-where-map" name="loc-where-map" type="text" placeholder="insert the location url here">
                <div class="error-hint" id="url-error"></div>

                <label>Dress code</label>
                <input id="edit-loc-dress" name="loc-dress" type="text" placeholder="write your dress code here">
                <div class="error-hint" id="dress-error"></div>

                <label>Parking</label>
                <input id="edit-loc-park" name="loc-park" type="text" placeholder="write the parking situation here">
                <div class="error-hint" id="park-error"></div>

                <label>Details</label>
                <textarea id="edit-loc-det" name="loc-det" type="text" placeholder="Additional details" style="width: -webkit-fill-available;height: 50px;"></textarea>
                <div class="error-hint" id="det-error"></div>

                <button class="rsvp-button" id="submit-button" type="submit" >Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    //-----------Insert edit <form> in database-------------------

$("#submit-button").on("click", function (e) {
  e.preventDefault(); // prevent default form submission behavior
    var time = $("#edit-loc-time").val();
    var where = $("#edit-loc-where").val();
    var where_url = $("#edit-loc-where-map").val();
    var dress = $("#edit-loc-dress").val();
    var parking = $("#edit-loc-park").val();
    var detail = $("#edit-loc-det").val();
    var isValid = true;

    if (!time) {
        $("#time-error").text("Please enter the time of your event");
        isValid = false;
    } else {
        $("#time-error").text("");
    }
    if (!where) {
        $("#where-error").text("Please enter the name of the place of your event");
        isValid = false;
    } else {
        $("#where-error").text("");
    }
    if (!where_url) {
        $("#url-error").text("Please enter an url for your destination");
        isValid = false;
    } else {
        $("#url-error").text("");
    }
    if (!dress) {
        $("#dress-error").text("Please enter the dress code for your wedding");
        isValid = false;
    } else {
        $("#dress-error").text("");
    }
    if (!parking) {
        $("#park-error").text("Please enter parking details");
        isValid = false;
    } else {
        $("#park-error").text("");
    }
    if (!detail) {
        $("#det-error").text("Please enter additional details for your event");
        isValid = false;
    } else {
        $("#det-error").text("");
    }

    if (isValid) {
    $.ajax({
            type: "POST",
            url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/editlocation.php",
            data: $("#input-form").serialize(),
            success: function (response) {
            $("#result").text("Succes");
            $(".bg-modal").hide();
            window.location.href = "index.php#location-section";
            alert("Thank you!");
            },
        });
    }
});


</script>