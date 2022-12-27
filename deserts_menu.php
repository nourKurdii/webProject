<?php
//start a session
session_start();

require_once('./php/CreateDb.php');
require_once ('./php/component.php');
// create instance of Createdb class
$database = new CreateDb("TAKIADb","NormalMenuTb");
addToCart('deserts_menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desert menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="normalStyle.css">
</head>
<body>
<?php
require_once ('php/header_cart.php')
?>
<div class="wrapper">
    <div class="title">
        <h4>Fresh food for good health<br>Desert menu</h4>
    </div>
    <div class="menu">
        <?php
        $result = $database->getData();
        if(isset($result))
            while ($row = mysqli_fetch_assoc($result)){
                if($row['type']=='desert')
                    component('deserts_menu.php',$row['product_name'], $row['product_price'], $row['product_discreption'], $row['product_image'],$row['id']);
            }
        else{
            echo 'nothing in the menu';
        }
        ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>