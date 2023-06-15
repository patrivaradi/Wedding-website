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
                <label>Change password for invited:</label>
                <input id="edit-pass" require name="pass1" type="password" placeholder="New password"/>
                <div class="error-hint" id="pass1-error"></div>
                <label>Repeat password:</label>
                <input id="pass-check" require name="pass2" type="password" placeholder="New password"/>
                <div class="error-hint" id="pass2-error"></div>
                <button class="rsvp-button" id="submit-button" type="submit" >Submit</button>
            </div>
        </form>
    </div>
</div>
<script>

//-----------Insert edit <form> in database-------------------

$("#submit-button").on("click", function (e) {
  e.preventDefault(); // prevent default form submission behavior
    var pass1=$("#edit-pass").val();
    var pass2=$("#pass-check").val();
    var isValid = true;

    if (!pass1) {
    $("#pass1-error").text("Please enter a new password");
    isValid = false;
    } else {
    $("#pass1-error").text("");
    }
    if (!pass2) {
    $("#pass2-error").text("Please enter the same password");
    isValid = false;
    } else {
    $("#pass2-error").text("");
    }
    if(pass1!=pass2)
    {
        isValid=false;
        $("#pass2-error").text("The two passwords don't match!");
    }
if (isValid) {
    $.ajax({
        type: "POST",
        url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/editpassword.php",
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