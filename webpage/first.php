<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../styles/styleFirstPage.css">
    <link rel="stylesheet" type="text/css" href="../styles/theme.css">
    <title>Wedding website</title>
</head>
<?php
include('db_connection.php');
$sql="SELECT `theme` FROM `passwords` WHERE `name`='invited'";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res)?>
<body class="<?=$row['theme']?>">
<?php }
    ?> 
    <div class="first-page">
        <form>
        <div class="password-div">
        <div class="password-text">Please input the password given to you in your invitation.</div>
        <input id="pass" name="pass" type="password" placeholder="password"/>
        <button class="button" id="button" type="submit" >Submit</button>
        </div>
        </form>
    </div>

<script>
    $("#button").on("click", function (e) {
        console.log("pass");
    e.preventDefault(); // prevent default form submission behavior
    var pass = $("#pass").val();
        $.ajax({
      type: "POST",
      url: "http://localhost/Licenta-Varadi_Patricia2023/webpage/passcheck.php",
      data: {pass:pass},
      success: function (response) {
        if(response == "ok"){
        window.location.href = "http://localhost/Licenta-Varadi_Patricia2023/webpage/index.php";
        }
        else if (response == "no")
        {
            alert("Invalid password!");
            $("#pass").val("");
        }
      }
    });
    });
</script>
</body>
</html>
