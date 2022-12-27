<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservation Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="reservation.css">
</head>
<body>

<section class = "banner">
    <h2>BOOK YOUR TABLE NOW</h2>
    <div class = "card-container">
        <div class = "card-img">
                <div class="container-time">
                    <h2 class="heading">Time Open</h2>
                    <h3 class="heading-days">Monday-Friday</h3>
                    <p>7am - 11am (breakfast)</p>
                    <p>11am - 10pm (lunch/dinner)</p>
                    <hr>
                    <h3 class="heading-days">Saturday and sunday</h3>
                    <p>9am - 1am (breakfast)</p>
                    <p>1am - 10pm (lunch/dinner)</p>
                </div>
        </div>

        <div class = "card-content">
            <form action="rproccess.php" method="post">
                <h3 name="status">Reservation </h3>
                    <?php
                    $Msg = "";
                    if(isset($_GET['failed']))
                    {
                        $Msg = "";
                        echo '<div class="alert alert-danger">'.$Msg.'</div>';
                    }

                    if(isset($_GET['success']))
                    {
                        $Msg = " Happy and looking forward to serve you ";
                        echo '<div class="alert alert-success">'.$Msg.'</div>';
                    }
                    ?>
                <div class = "form-row">
                    <input type="date" name="date" required="required">
                    <input type="time" name="time" required="required">
                </div>
                <div class = "form-row">
                    <input type = "text" placeholder="Full Name" name="name" required="required">
                    <input type = "text" placeholder="+970-123456789" name="phone" required pattern="[+][0-9]{3}-[0-9]{9}">
                </div>

                <div class = "form-row">
                    <input type = "number" placeholder="How Many Persons?" min = "1" name="select" required="required">
                </div>
                <div class="form-row">
                    <input type = "submit" value = "BOOK TABLE" name="submit">
                </div>
            </form>
        </div>
    </div>
</section>

</body>
</html>


