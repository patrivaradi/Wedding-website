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
    <div class="modal-contents">
        <form id="input-form" enctype="multipart/form-data">
            <div class="form-about">
                <div id="result"></div>
                <div class="close" onclick="window.open('index.php','_self');">+</div>
                
                <label>Upload pictures of her</label>
                <input id="uplimgher" type="file" name="uplimgher">
                
                <label>Her side of the story</label>
                <textarea id="story-her" name="story-her" type="text" placeholder="write here her story" style="width: -webkit-fill-available;height: 150px;"></textarea>
                
                <label>Upload pictures of him</label>
                <input id="uplimghim" type="file" name="uplimghim">
                
                <label>His side of the story</label>
                <textarea id="story-him" name="story-him" type="text" placeholder="write here his story" style="width: -webkit-fill-available;height: 150px;"></textarea>
                
                <p id="errorms"></p>
                <button class="rsvp-button" id="submit-button" type="submit" >Submit</button>
            </div>
        </form>
    </div>
</div>
<script>

    //-----------Insert edit <form> in database-------------------

$("#submit-button").on("click", function (e) {
  e.preventDefault(); // prevent default form submission behavior
    let form_data=new FormData();
    let imgher = $("#uplimgher")[0].files;
    let storyher = $("#story-her").val();
    let imghim = $("#uplimghim")[0].files;
    let storyhim = $("#story-him").val();

    if(imgher.length>0&&imghim.length>0){
        form_data.append('herimg',imgher[0]);
        form_data.append('himimg',imghim[0]);
        form_data.append('story-her', storyher);
        form_data.append('story-him', storyhim);
        $.ajax({
            type: "POST",
            url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/editabout.php",
            data: form_data,
            contentType:false,
            processData:false,
            success: function (response) {                
                alert(form_data);
            $("#result").text("Succes");
            $(".bg-modal").hide();
            window.location.href = "index.php";
            alert("Thank you!");
            },
        });

    }else{
        $("#errorms").text("Please select an image for both!");
    }
});

</script>