<?php
include('header.php');
include('db_connection.php');

$query="SELECT * FROM `rsvp`";
$result=mysqli_query($con,$query);

$sql="SELECT `theme` FROM `passwords` WHERE `name`='invited'";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_assoc($res)?>
<body class="<?=$row['theme']?>">
<?php }
    ?> 
   <a id="back-button" href="index.php#rsvp-section"><i class="fa-solid fa-arrow-left-long"></i>  BACK</a> 
<div class="bg-modal">
    
    <div class="rsvp-table-header">
    <h1>RSVP RESPONSES</h1>
    </div>
    <div class="rsvp-table">
        <table class="table">
        <thead>    
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>E-MAIL</th>
                <th>ATTEND NR</th>
                <th>OTHER ATTENDANTS</th>
                <th>MESSAGE</th>
                <th>FOOD PREFERENCE</th>
                <th>WEDDING OF</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody><tr>
            <?php
                while($rows=mysqli_fetch_assoc($result)){
            ?>
            
                <td data-title="ID"><?php echo $rows['id']?></td>
                <td data-title="Name"><?php echo $rows['name']?></td>
                <td data-title="Email"><?php echo $rows['email']?></td>
                <td data-title="Attendants"><?php echo $rows['attends']?></td>
                <td data-title="Other names"><?php echo $rows['others-names']?></td>
                <td data-title="Message"><?php echo $rows['message']?></td>
                <td data-title="Food preference"><?php echo $rows['food-preference']?></td>
                <td data-title="Wedding of"><?php echo $rows['wedding_of']?></td>
                <td>
            <form class="delete_rsvp" action="delete_rsvp.php" method="post">
                <input type="hidden" name="rsvp_id" value="<?=$rows['id']?>">
                <input id="delete-button" type="submit" name="delete" value="Delete">
            </form></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        </table>
    </div>
</div>