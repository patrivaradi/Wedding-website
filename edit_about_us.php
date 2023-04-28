<?php
include('header.php');
?>
<div class="bg-modal">
    <div class="modal-contents">
        <form id="input-form">
            <div class="form-about">
                <div id="result"></div>
                <div class="close" onclick="window.open('index.php','_self');">+</div>
<!--                 
                <label>Upload pictures of her</label>
                <input id="uplimgher" type="file" name="uplimgher">
                 -->
                <label>Her side of the story</label>
                <textarea id="edit-story-her" name="story-her" type="text" placeholder="write here her story" style="width: -webkit-fill-available;height: 150px;"></textarea>
<!--                 
                <label>Upload pictures of him</label>
                <input id="uplimghim" type="file" name="uplimghim">
                 -->
                <label>His side of the story</label>
                <textarea id="edit-story-him" name="story-him" type="text" placeholder="write here his story" style="width: -webkit-fill-available;height: 150px;"></textarea>
                
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
        url: "http://localhost/Licenta-Varadi_Patricia2023/editabout.php",
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