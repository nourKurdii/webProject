<?php

if(isset($_POST['submit'])) {
    $connect = mysqli_connect('localhost', 'root', '', 'takiadb');

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = (string)$_POST['date'];
    $time = (string)$_POST['time'];
    $num = $_POST['select'];
    $subject = 'RESERVATION';
    $to = 'schooldb9@gmail.com';
    $message = "Name :" . "\n" . $name . "\n\n" . "coming on :" . "\n" . $date . "\n\n" . "At :" . "\n" . $time . "\n\n" . "With :" . "\n" . $num . "persons" . "\n\n" . "Phone :" . "\n" . $phone;
    $headers = "From: " . $phone;
    if (mail($to, $subject, $message, $headers)) {
        $insert = "insert into `resirvation` (date,name,number,phone,time) values
        ('$date','$name','$num','$phone','$time')";
        $run_pro = $connect->query($insert);
        if (isset($run_pro)) {
            header("location: reservation.php?success");
        } else {
            header("location: reservation.php?failed");
        }
    }
}
?>

