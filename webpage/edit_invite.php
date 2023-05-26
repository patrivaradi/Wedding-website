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
            <div class="form-group">
                <div id="result"></div>
                <div class="close" onclick="window.open('index.php','_self');">+</div>
                <label>Names</label>
                <input id="edit-name" require name="name" type="text" placeholder="ex: Jim & Pam"/>
                <div class="error-hint" id="name-error"></div>
                <label>Invitation text</label>
                <input id="edit-text" require name="text" type="text" placeholder="ex: Are getting married!"/>
                <div class="error-hint" id="text-error"></div>
                <label>Date of the wedding</label>
                <input id="edit-date" require name="date" type="date"/>
                <div class="error-hint" id="date-error"></div>
                <button class="rsvp-button" id="submit-button" type="submit" >Submit</button>
            </div>
        </form>
    </div>
</div>
<script>

//-----------Insert edit <form> in database-------------------

$("#submit-button").on("click", function (e) {
  e.preventDefault(); // prevent default form submission behavior
    var names=$("#edit-name").val();
    var text=$("#edit-text").val();
    var date=$("#edit-date").val();
    var isValid = true;

    if (!names) {
    $("#name-error").text("Please enter your names");
    isValid = false;
    } else {
    $("#name-error").text("");
    }
    if (!text) {
    $("#text-error").text("Please enter your text");
    isValid = false;
    } else {
    $("#text-error").text("");
    }
    if (!date) {
    $("#date-error").text("Please enter your date");
    isValid = false;
    } else {
    $("#date-error").text("");
    }
if (isValid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/editinvite.php",
        data: $("#input-form").serialize(),
        success: function (response) {
        $("#result").text("Succes");
        $(".bg-modal").hide();
        window.location.href = "index.php";
        alert("Thank you!");
        },
    });
}
});

</script>