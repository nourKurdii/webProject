<?php

$login_cookie=$_COOKIE['adminlogin'];
if($login_cookie!=1){
    header("location: admin_login.php");
}

?>
