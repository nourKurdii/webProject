<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
if(isset($_POST['submit'])){
$mail = new PHPMailer;

$mail->IsSMTP();
$mail->SMTPDebug = 3;
$mail->SMTPAuth = true;
$mail->SMTPSecure = '';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "schooldb9@gmail.com";
$mail->Password = "maya123456*";

$mail->setFrom("schooldb9@gmail.com", 'admin');
$mail->addAddress("schooldb9@gmail.com", 'Takia');
$mail->addReplyTo("schooldb9@gmail.com", 'Reply');
$mail->isHTML(true);
 $name=$_POST['name'];
 $phone=$_POST['phone'];
 $msg=$_POST['msg'];
 $email=$_POST['email'];
    $path='upload/'.$_FILES['attachment']['name'];
    $message = '<html><body>';
    $message .= '<img src="images/takia.png" width="50px" height="50px" alt="Takia Website" />';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
    $message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['msg']) . "</td></tr>";
    $message .= "<tr><td><strong>Phone number:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";
    $message .="<img src=$path id='img_email'>";
//    $message .= "<tr><td><strong>URL To Change (main):</strong> </td><td>" . $_POST['URL-main'] . "</td></tr>";
//    $addURLS = $_POST['addURLS'];
//    if (($addURLS) != '') {
//        $message .= "<tr><td><strong>URL To Change (additional):</strong> </td><td>" . strip_tags($addURLS) . "</td></tr>";
//    }
//    $curText = htmlentities($_POST['curText']);
//    if (($curText) != '') {
//        $message .= "<tr><td><strong>CURRENT Content:</strong> </td><td>" . $curText . "</td></tr>";
//    }
//    $message .= "<tr><td><strong>NEW Content:</strong> </td><td>" . htmlentities($_POST['newText']) . "</td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";
 $mail->Subject = 'work application';
$mail->Body = $message;
$mail->AltBody = 'Thank you for your interest.';

$mail->AddEmbeddedImage($path,'img_email');

if(!$mail->send()) {
echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message has been sent";
}}
?>
<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
//require_once "vendor/autoload.php";
//if (isset($_POST["submit"])){
////PHPMailer Object
//$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
//
////From email address and name
//$mail->From = "schooldb9@gmail.com";
//$mail->FromName = $_POST["name"];
//
////To address and name
//$mail->addAddress("schooldb9@gmail.com", "maya");
//$mail->addAddress("schooldb9@gmail.com"); //Recipient name is optional
//
////Address to which recipient will reply
//$mail->addReplyTo("schooldb9@gmail.com", "Reply");
//
////CC and BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com");
//
////Send HTML or Plain Text email
//$mail->isHTML(true);
// $name=$_POST['name'];
// $phone=$_POST['phone'];
// $msg=$_POST['msg'];
// $email=$_POST['email'];
// $message = "From :".$email."\n"."Name :" . $name . "\n" . "message :" . "\n" . $msg ."\n" . "phone :" .$phone."\n";
//$mail->Subject = "Subject Text";
//$mail->Body = "<i>Mail body in HTML</i>";
//$mail->AltBody = $message;
//
//try {
//    $mail->send();
//    echo "Message has been sent successfully";
//} catch (Exception $e) {
//    echo "Mailer Error: " . $mail->ErrorInfo;
//}}
//?>
<?php
//require "PHPMailer/PHPMailerAutoload.php";
//
//if (isset($_POST["submit"])){
//$path='upload/'.$_FILES['attachment']['name'];
// $msg = $_POST['msg'];
// $attachment=$_FILES['attachment']['name'];
// $attachment_tmp=$_FILES['attachment']['tmp_name'];
// $name=$_POST['name'];
// $phone=$_POST['phone'];
// $msg=$_POST['msg'];
// $message = "Name :" . $name . "\n" . "message :" . "\n" . $msg ."\n" . "phone :" .$phone."\n";
////move_uploaded_file($attachment_tmp,'images/$attachment1.png');
//$mail= new PHPMailer();
//$mail->IsSMTP();
//$mail->Host='smtpout.secureserver.net';
//$mail->Port='80';
//$mail->SMTPAuth=true;
//$mail->Username='schooldb9@gmail.com';
//$mail->Password='maya123456*';
//$mail->SMTPSecure='';
//$mail->From=$_POST["email"];
//$mail->FromName=$_POST["name"];
//$mail->AddAddress('schooldb9@gmail.com','Takia');
//$mail->WordWrap=true;
//$mail->IsHTML(true);
////$mail->AddAttachment($path);
//$mail->Subject='work application';
//$mail->Body=$message;
//if ($mail->Send()){
//echo "sucsess";
////unlink($path);
//}
//else{
//    echo "failed";
//}
//}
//?>