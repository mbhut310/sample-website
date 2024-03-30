<?php 
  include_once('guest_header.php');
  $email=$_SESSION['email'];
  $select="select * from users where u_email='$email'";
  $result=$con->query($select);
  $row=$result->fetch_assoc();
  $u_id=$row['u_id'];
?>
<?php
include_once("guest_header.php"); 
?>
<div class="container-fluid">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Edit Profile</h2>
            <form method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter email" name="username" value="<?= $row['u_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $row['u_email']; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
                <button type="submit" class="btn btn-primary" name="change_password">Change Password</button>
            </form>
        </div>
    </div>
</div>
<?php 
if(isset($_POST['update']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $update="update users set u_name='$username',u_email='$email' where u_id=$u_id";
    $con->query($update);
                ?>
                    <script>
    window.location.href="profile.php";
</script>
                <?php
}