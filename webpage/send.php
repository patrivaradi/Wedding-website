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
<!-- <div id="rsvp-section" class="rsvp-section"> -->
<div class="bg-modal" style=" overflow-y: scroll;">
    <div class="modal-contents" >
        
        <form id="input-form" >
            <div class="form-group" >
                <div id="result"></div>
                <div class="close" onclick="window.open('index.php#rsvp-section','_self');">+</div>

                <label>Name</label>
                <input id="form-name" name="name" type="text" placeholder="Name"/>
                <div class="error-hint" id="name-error"></div>

                <label>E-mail</label>
                <input id="form-mail" name="email" type="email" placeholder="E-mail"/>
                <div class="error-hint" id="email-error"></div>

                <label>Nr of attendees</label>
                <input id="form-nr" name="number" type="number" placeholder="Nr of attendees"/>
                <div class="error-hint"  id="number-error"></div>
                

                <div class="others-names">
                <label>List names of others attending</label>
                <input id="form-other-names" name="other-names" type="text" placeholder="List names of others attending"/>
                </div>
                
                <label>Send us a message, request a song..</label>
                <input id="form-text" name="message" type="text" placeholder="Send us a message, request a song.." />
                
                <label>List any food restrictions</label>
                <input id="form-food" name="food" type="text" placeholder="List any food restrictions" />

                <button class="rsvp-button" id="submit-button" type="submit" >Submit</button>
            </div>
        </form>
    </div>
</div>
<script>

// ---------showing input field only if necessary----------
$("#form-nr").on("input",function(){
  var number = $(this).val();
  var othersNames = $(".others-names");
  if(number>1){
    othersNames.show();
  }
  else{
    othersNames.hide();
  }
});

//-----------Validating rsvp <form> and inserting in database-------------------

$("#submit-button").on("click", function (e) {
  e.preventDefault(); // prevent default form submission behavior

  var name = $("#form-name").val();
  var email = $("#form-mail").val();
  var number = $("#form-nr").val();
  var others = $("#form-other-names").val();
  var message = $("#form-text").val();
  var food = $("#form-food").val();
  var isValid = true;

  var namePattern = /^[a-zA-Z\s]+$/;
  if (!name) {
    $("#name-error").text("Please enter your name");
    isValid = false;
  } else if (!namePattern.test(name)) {
  $("#name-error").text("Please enter a valid name using only alphabetical characters and spaces");
  isValid = false;
  } else {
    $("#name-error").text("");
  }
  
  var emailPattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if (!email) {
    $("#email-error").text("Please enter your email");
    isValid = false;
  } else if (!emailPattern.test(email)) {
  $("#email-error").text("Please enter a valid email address");
  isValid = false;
  } else {
    $("#email-error").text("");
  }

  var numberPattern = /^[1-9]\d*$/;
  if (!number) {
    $("#number-error").text("Please enter number of attendees");
    isValid = false;
  } else if (!numberPattern.test(number)) {
  $("#number-error").text("Please enter a valid number of attendees (positive integers only)");
  isValid = false;
  } else {
    $("#number-error").text("");
  }

  if (isValid) {
    $.ajax({
      type: "POST",
      url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/sent.php",
      data: $("#input-form").serialize(),
      success: function (response) {
        if (response == "exists") {
          var confirmed = confirm(
            "Your data already exists in our database. Do you want to update it?"
          );
          if (confirmed) {
            // User clicked "OK"
            $.ajax({
              type: "POST",
              url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/update.php",
              data: $("#input-form").serialize(),
              success: function (response) {
                $("#result").text("Succes");
                $(".bg-modal").hide();
                window.location.href = "index.php#rsvp-section";
                alert("Thank you! Your rsvp has been updated.");
              },
            });
          } else {
            // User clicked "Cancel"
            window.location.href = "index.php#rsvp-section";
          }
        } else if (response == "go") {
          $.ajax({
            type: "POST",
            url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/ajax.php",
            data: $("#input-form").serialize(),
            success: function (response) {
              $("#result").text("Succes");
              $(".bg-modal").hide();
              window.location.href = "index.php#rsvp-section";
              alert("Thank you! Your rsvp has been received.");
            },
          });
        }
      },
    });
  }
});

</script>