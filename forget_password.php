<?php
include_once("guest_header.php");
date_default_timezone_set('Asia/Kolkata');
$current_time = date('Y-m-d H:i:s');
echo $current_time."<br>";
$current_time=date('Y-m-d H:i:s',strtotime($current_time)-60);
echo $current_time;
$delete="delete from otp where otp_create_time<'$current_time'";
$con->query($delete);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer\PHPMailer.php');
require('PHPMailer\SMTP.php');
require('PHPMailer\Exception.php');
?>
<div class="container-fluid w-50 ">
    <div class="row d-flex align-center">
        <div class="col">
            <h2>Forget Password</h2>
            <form method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <button type="submit" class="btn btn-primary" name="send_otp">Send OTP</button>
            </form>
        </div>
    </div>
</div>
<?php 
if(isset($_POST['send_otp']))
{

    $email=$_POST['email'];
    $select="select * from users where u_email='$email'";
    $result=$con->query($select);
    if($result->num_rows>=1)
    {
        $row=$result->fetch_assoc();
        $username=$row['u_name'];
        $email=$row['u_email'];
        $otp=rand(1000,9999);
        $mail = new PHPMailer();
        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'nisha.kukadiya@rku.ac.in'; // SMTP username
            $mail->Password = '********'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to
            // $mail->SMTPDebug = 2;

            // Recipients
            $mail->setFrom('nisha.kukadiya@rku.ac.in', 'Nisha Kukadiya'); // Sender's email address and name
            $mail->addAddress($email,$username); // Recipient's email address and name

            // Attachments
            //$mail->addAttachment('/path/to/attachment/file.pdf', 'Attachment.pdf'); // Path to the attachment and optional filename

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = $otp;

            // Send the email
            $mail->send();
            $insert="insert into otp values ('$email',$otp,CURRENT_TIMESTAMP)";
            $con->query($insert);
            ?>
            <script>
                window.location.href="otp.php?email=<?=$email?>";
            </script>
            <?php
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    }
    else{echo "this mail id is not register yet";}
}
?>