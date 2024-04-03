<?php
include_once("guest_header.php");
$email=$_REQUEST['email'];
?>
<div class="container-fluid w-50 ">
    <div class="row d-flex align-center">
        <div class="col">
            <h2>OTP</h2>
            <form method="post">
                <div class="form-group">
                    <label for="otp">OTP:</label>
                    <input type="number" class="form-control" id="otp" name="otp">
                </div>
                <button type="submit" class="btn btn-primary" name="match_otp">Match OTP</button>
                <button type="submit" class="btn btn-primary" name="re-send_otp">Re-Send OTP</button>
            </form>
        </div>
    </div>
</div>
<?php 
if(isset($_POST['match_otp']))
{
    $otp=$_POST['otp'];
    $select="select * from otp where u_email='$email'";
    $result=$con->query($select);
    $row=$result->fetch_assoc();
    date_default_timezone_set('Asia/Kolkata');
    $current_time = date('Y-m-d H:i:s');
    // echo $current_time."<br>";
    $current_time=date('Y-m-d H:i:s',strtotime($current_time)-60);
    // echo $current_time;
    if($row['otp_create_time']>=$current_time)
    {
        if($otp==$row['otp'])
        {
            ?>
            <script>
                window.location.href="new_password.php?email=<?= $email ?>";
            </script>
            <?php
        }
        else{echo "not match";}
    }
    else{echo "otp is expire Resend Otp";}
}
if(isset($_POST['re-send_otp']))
{
    date_default_timezone_set('Asia/Kolkata');
$current_time = date('Y-m-d H:i:s');
// echo $current_time."<br>";
$current_time=date('Y-m-d H:i:s',strtotime($current_time)-60);
// echo $current_time;
$delete="delete from otp where otp_create_time<'$current_time'";
$con->query($delete);
    $otp=rand(1000,9999);
    $insert="insert into otp values ('$email',$otp,CURRENT_TIMESTAMP)";
    $con->query($insert);
}
?>