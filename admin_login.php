<?php
session_start();

//connect db
$con=mysqli_connect('localhost','root','','takiadb');
//post value

if(isset($_POST['login'])){
    $a_name=@$_POST['a_name'];
    $a_pass=@$_POST['a_pass'];
    //get admin name and pass
$get_admin="select * from admin where a_name ='$a_name' AND a_pass='$a_pass'";
$run_admin=mysqli_query($con,$get_admin);
//admin isset
    if(mysqli_num_rows($run_admin)==1){
        //if i have only one admin
        $row_admin=mysqli_fetch_array($run_admin); //to organize data in array
    //admin value isset
        $aname=$row_admin['a_name'];
        //cookie here
        setcookie("aname",$aname,time()+60*60*24);
        setcookie("adminlogin",1,time()+60*60*24);
        echo '<script> alert("welcome again admin");</script>';
        header("location: admin_ok.php");
    }
    else{
        echo '<script> alert("You are not an admin");</script>';
    }
}



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<form method="post" action="admin_login.php" class="login-box">
    <h1>Login</h1>
    <div class="textbox">
        <i class="fas fa-user"></i>
        <input name="a_name" type="text" placeholder="Username">
    </div>

    <div class="textbox">
        <i class="fas fa-lock"></i>
        <input name="a_pass" type="password" placeholder="Password">
    </div>

    <input name="login" type="submit" class="btn" value="Sign in">
</form>
</body>
</html>
