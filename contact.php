<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TAKIA</title>
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<header id="he">
    <div class="container">
        <nav class="nav">
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </div>
            <a href="index.html" class="logo" style="color: white ; font-size: 30px">Takia</a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="index.html" class="nav-link active"> Home </a>
                </li>
                <li class="nav-item">
                    <a href="#d_o_s" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="team.php" class="nav-link">Our Team</a>
                </li>
                <li class="nav-item">
                    <a href="menu.html" class="nav-link">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-- end header-->
<section class="contact">
    <div class="contact-container">
        <div class="contactinfo">
            <div class="contact-box">
                <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                <div class="contact-text">
                    <h3>Address</h3>
                    <p> rafedia street, <br> Nablus, Palestine </p>
                </div>
            </div>
            <div class="contact-box">
                <div class="contact-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                <div class="contact-text">
                    <h3>Phone</h3>
                    <p> (+970 123456789)  </p>
                </div>
            </div>
            <div class="contact-box">
                <div class="contact-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                <div class="contact-text">
                    <h3>Email</h3>
                    <p>support@Takia.food</p>
                </div>
            </div>
        </div>
        <div class="contactform">
            <form action="cprocess.php" method="POST">
                <h2 name="status">
                    <?php
                    $Msg = "";
                    if(isset($_GET['error']))
                    {
                        $Msg = "Contact Us";
                        echo '<div class="alert alert-danger">'.$Msg.'</div>';
                    }

                    if(isset($_GET['success']))
                    {
                        $Msg = " Your message has been sent ,Thank you  ";
                        echo '<div class="alert alert-success">'.$Msg.'</div>';
                    }
                    ?>
                <div class="contact-inputbox">
                    <input type="text" name="c-name" required="required">
                    <span> Full Name </span>
                </div>
                <div class="contact-inputbox">
                    <input type="text" name="c-mail" required="required">
                    <span> Email </span>
                </div>
                <div class="contact-inputbox">
                    <input type="text" name="c-message" required="required">
                    <span> Type your Message </span>
                </div>
                <div class="contact-inputbox">
                    <input type="Submit" name="submit" value="Send" >
                </div>
            </form>
    </div>
</section>
<!-- contact -->
<!-- map -->
<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4637.567234127615!2d35.23726500291579!3d32.22189633059008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ce0f650425697%3A0x7f0ba930bd153d84!2z2YbYp9io2YTYsw!5e0!3m2!1sar!2s!4v1606658353809!5m2!1sar!2s" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>
<!-- //map -->

<!-- footer -->
<footer>
    <div class="container">
        <div class="back-to-top">
            <a href="#he"><i class="fas fa-chevron-up"></i></a>
        </div>
        <div class="footer-content">
            <div class="footer-content-about animate-top">
                <h4> About Takia </h4>
                <div class="asterisk"><i class="fas fa.asterisk"> </i></div>
                <p>
                    lorem ipsum dolar sit amet. consectetur adihkjhhgn ,husnhusnjuhsks jshuemklahhsd hduukwkannjs
                    jsjs nnjjdn skisnllssjm. juwunsmlsljsbnmskknsusmsksmms
                    bhjsjmshhjmdmjjd.
                </p>
            </div>
            <div class="footer-content-divider animate-bottom">
                <div class="social-media">
                    <h4>Follow along</h4>
                    <ul class="social-icons">
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-tripadvisor"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="newsletter-container">
                    <h4>news letter</h4>
                    <form action="" class="newsletter-form">
                        <input type="text" class="newsletter-input" placeholder="your email address">
                        <button class="newsletter-btn" type="submit">
                            <i class="fas fa-envelope"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="main.js"></script>
</body>
</html>
