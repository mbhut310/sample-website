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
if(isset($_POST['change_password']))
{
    ?>
        <div class="container-fluid">
        <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>Change Password</h2>
            <form method="post">
                <div class="form-group">
                    <label for="old_password">Old Password:</label>
                    <input type="password" class="form-control" id="old_password" placeholder="Enter Old Password" name="old_password">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" class="form-control" id="new_password" placeholder="Enter New Password" name="new_password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Re-Enter Password" name="confirm_password">
                </div>
                <button type="submit" class="btn btn-primary" name="update_password">Update Password</button>
            </form>
        </div>
    </div>
</div>
    <?php 
    if(isset($_POST['update_password']))
    {
        $old_password=$_POST['old_password'];
        $new_password=$_POST['new_password'];
        $confirm_password=$_POST['confirm_password'];
        if(password_verify($old_password,$row['u_password']))
        {
            if($new_password==$confirm_password)
            {
                $new_password=password_hash($new_password,PASSWORD_DEFAULT);
                $update="update users u_password='$new_password' where u_id=$u_id";
                $con->query($update);
                ?>
                    <script>
                        window.location.href="profile.php";
                    </script>
                <?php
            }
            else{echo "New Password and Confirm Password Doesn't Match";}
        }
        else{echo "Old Password Doesn't Match";}
    }
}