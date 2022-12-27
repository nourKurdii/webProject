<?php

if(isset($_POST['submit'])) {
    $connect = mysqli_connect('localhost', 'root', '', 'takiadb');
    $name = $_POST['c-name'];
    $email = $_POST['c-mail'];
    $msg = $_POST['c-message'];
    $subject = 'FEED BACK';
    $to = 'schooldb9@gmail.com';
    $message = "Name :" . $name . "\n\n" . "Wrote the following :" . "\n" . $msg;
    $msg2 = "Sent Successfully! Thank you" . " " . $name . ", We will contact you shortly!";
    $headers = "From: " . $email;

    if (mail($to, $subject, $message, $headers)) {
        $insert = "insert into `contact` (person,email,message) values
        ('$name','$email','$msg')";
        $run_pro = $connect->query($insert);
    }
    if (isset($run_pro)) {
        header("location: contact.php?success");
    } else {
        header("location:contact.php");
    }
}
?>