<?php
session_start();

ini_set("display_errors","off");
$data = array();
$con = mysqli_connect('localhost','francis6_magicparty','g.sW6zx!4qGo','francis6_magicparty');

$to = "bookings@francisang.com";
$subject = "New Booking Confirm";

$prefix = $_POST['prefixname1'];
$name = $_POST['nameaddress1'];
$email = $_POST['email1'];
$countryCode = $_POST['countrycode1'];
$contactnumber = $_POST['contactnumber1'];
$dateofparty = $_POST['dateofparty1'];
$timeofparty = $_POST['timeofparty1'];
$childname = $_POST['childname1'];
$childgender = $_POST['childgender1'];
$childbirthdate = $_POST['childbirthdate1'];
$message = $_POST['message1'];
$from = $_POST['email1'];

mysqli_query($con, "INSERT into bookings set prefixname = '".$prefix.".', name = '".$name."', email = '".$email."', contactnumber = '".$countryCode." ".$contactnumber."', dateofparty = '".$dateofparty."', timeofparty = '".$timeofparty."', childname = '".$childname."', childgender = '".$childgender."', childdateofbirth = '".$childbirthdate."', message = '".$message."'");

require_once ('phpmailer/class.phpmailer.php');
  function mail_send($to,$subject,$final_content){
    
    $mail = new PHPMailer;
    $mail->Host = 'mail.magicparty.sg';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'no-reply@magicparty.sg';                 // SMTP username
    $mail->Password = 'noreply@4321';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;
  
    $site_ename = 'MagicParty.sg';
    $site_email = 'Magicparty';
    //$mail->setFrom($site_ename,$site_email);
    
    $mail->From ='no-reply@magicparty.sg';
    $mail->FromName = 'MagicParty.sg';
    //$mail->addReplyTo($_POST['email'], 'Reply');
    $mail->addAddress($to);              
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $final_content;
    $mail->send(); 

    }



$mailmessage = "<div style='color: #333333; font-size: 150%;font-family:Open Sans,sans-serif;background: #fafafa none repeat scroll 0 0;    border-bottom: 2px solid #ececec;padding:10px 10px;'>Booking Details</div>
    <table style='width:100%;border:1px solid #f0f0f0;padding:10px 20px;'>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Name</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$prefix.". ".$name."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Email Address</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$email."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Contact Number</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$countryCode." ".$contactnumber."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Date of Party</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".date("d-m-Y", strtotime($dateofparty))."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Time of Party</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$timeofparty."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Child's Name</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$childname."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Child's Gender</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$childgender."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Child's Date of Birth</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".date("d-m-Y", strtotime($childbirthdate))."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Message</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$message."</td>
        </tr>
    </table>";
    //mail($to,$subject,$mailmessage,$header,$from);
    
mail_send($to,$subject,$mailmessage);

$subject = "Thank You - Your Booking has been submitted";
$to = $email;


$message1 = "<div style='color: #333333; font-size: 150%;font-family:Open Sans,sans-serif;background: #fafafa none repeat scroll 0 0;   border-bottom: 2px solid #ececec;padding:10px 10px;'>Booking Details</div>
    <table style='width:100%;border:1px solid #f0f0f0;padding:10px 20px;'>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Name</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$prefix.". ".$name."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Email Address</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$email."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Contact Number</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$countryCode." ".$contactnumber."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Date of Party</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".date("d-m-Y", strtotime($dateofparty))."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Time of Party</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$timeofparty."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Child's Name</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$childname."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Child's Gender</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$childgender."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Child's Date of Birth</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".date("d-m-Y", strtotime($childbirthdate))."</td>
        </tr>
        <tr>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:220px;'>Message</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;width:10px;'>:</td>
            <td style='font-size:17px;font-family:Open Sans,sans-serif;color:#333;'>".$message."</td>
        </tr>
    </table>";
mail_send($to,$subject,$message1);
    
    $data['results'] = 'success';
    echo json_encode($data);
    exit;
    //header("Location: http://magicparty.sg/index.html#bookSection");
?>