<?php
session_start();
require_once ('php/CreateDb.php');
require_once ("./php/component.php");
$amount=array();
if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }

    }
    }

if (isset($_POST['purchase'])){
    $db = new CreateDb("TAKIADb", 'NormalMenuTb');
    $result = $db->getData();
    if (isset($result))
    foreach ($_SESSION['cart'] as $key => $value) {
            while ($row = mysqli_fetch_assoc($result)) {
            if($value["product_id"]==$row['id']){
                unset($_SESSION['cart'][$key]);
                $db->updateData($row['numberOfOrders']+1,$row['id']);
                break;
            }
            }
        $db->con = mysqli_connect($db->serverName,$db->userName,$db->password,$db->dbName);
        $date=date('Y-m-d');
        $product_name=$row['product_name'];
        $sql = "INSERT INTO SALES (product_name,buy_date)VALUES('".$product_name ."',CAST('". $date ."' AS DATE))";
        if (!mysqli_query($db->con, $sql)){
            echo "Error creating table : " . mysqli_error($db->con);
        }

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
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
        <h4>Fresh food for good health<br>Your Delicious Cart</h4>
    </div>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <?php
                $total = 0;
                if (isset($_SESSION['cart'])) {
                    $product_id = array_column($_SESSION['cart'], 'product_id');
                    $db = new CreateDb("TAKIADb",'NormalMenuTb');
                        $result = $db->getData();
                        if(isset($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                for ($i = 0; $i < sizeof($product_id); $i++) {
                                    if ($row['id'] == $product_id[$i]) {
                                        cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                                        $total = $total + (int)$row['product_price'];
                                    }
                                }
                            }
//                            if(sizeof($product_id)!=0)
//                            echo "<form method=\"post\" action=\"cart.php\">
//                           <button type=\"submit\" class=\"btn mx-2\" name=\"addNewQuantity\" style=\"background-color: #c59d5f\">Compute new price</button>
//                           </form>";
                        }


                }
                else{
                    echo "<h5>Cart is Empty</h5>";
                }
                ?>
            </div>

            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                         <h6>Price</h6>

                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php
                                echo $total;
                                ?></h6>
                        </div>
                    </div>


                </div>


                <div class="pt-4">
                    <form method="post" action="cart.php">
                    <h6>CONTACT INFORMATION</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <h6>Email</h6>

                            <h6>Phone number</h6>
                            <hr>

                                <input type="submit" value="Purchase" name="purchase" class="btn mx-2" style="background-color: #c59d5f;">


                        </div>
                        <div class="col-md-6">
                            <input type="email" name="emailAddress" placeholder="youremail@gmail.com" required class="emailInput">
                            <input type = "text" placeholder="+970-123456789" name="phone" required pattern="[+][0-9]{3}-[0-9]{9}">
                            <hr>

                        </div>
                    </div>
                    </form>


                </div>




            </div>

        </div>


    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
