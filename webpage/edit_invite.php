<?php
include('header.php');
?>
<div class="bg-modal">
    <div class="modal-contents" >
        <form id="input-form">
            <div class="form-group">
                <div id="result"></div>
                <div class="close" onclick="window.open('index.php','_self');">+</div>
                <label>Names</label>
                <input id="edit-name" name="name" type="text" placeholder="ex: Jim & Pam"/>
                <label>Invitation text</label>
                <input id="edit-text" name="text" type="text" placeholder="ex: Are getting married!"/>
                <label>Date of the wedding</label>
                <input id="edit-date" name="date" type="date"/>
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
        url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/editinvite.php",
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