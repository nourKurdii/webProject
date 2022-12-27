<?php
//start a session
session_start();

require_once('./php/CreateDb.php');
require_once ('./php/component.php');
// create instance of Createdb class
$database = new CreateDb("TAKIADb","team");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TAKIA</title>
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="team.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header style="background: #121212" id="h">
    <div class="container">
        <nav class="nav">
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </div>
            <a href="index.html" class="logo" >Takia</a>
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
<section  class="mid-bar" >
    <div class="container">
        <div class="global-headline">
            <div class="animate-top">
                <h2 class="sub-headline">
                </h2>
            </div>
            <div class="animate-bottom">
            </div>
        </div>
    </div>
</section>
<!--end mid-->
<section class="ser" >
    <div class="services">
        <h1>Our Services</h1>
        <div class="cen">
            <div class="service">
                <i class="fas fa-truck"></i>
                <h2>Free Delivery </h2>
                <p></p>
            </div>

            <div class="service">
                <i class="fab fa-android"></i>
                <h2>Available for android</h2>
                <p></p>
            </div>

            <div class="service">
                <i class="fab fa-angellist"></i>
                <h2>24/7 Available</h2>
                <p></p>
            </div>

            <div class="service">
                <i class="fas fa-apple-alt"></i>
                <h2>Available for IOS</h2>
                <p></p>
            </div>

            <div class="service">
                <a href="work.html"><i class="fas fa-archway" ></i></a>
                <h2> Job Opportunity </h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>

            <div class="service">
                <i class="far fa-angry"></i>
                <h2>Customer Satisfaction </h2>
                <p></p>
            </div>
        </div>
    </div>

</section>
<!--end services-->
<section >
    <div class="team-container" >
        <h1 class="team-heading"> Our Great Team </h1>
        <div class="card-wrapper">
            <?php
            $result = $database->getData();
            if(isset($result))
                while ($row = mysqli_fetch_assoc($result)){
                        teamcomponent($row['id'],$row['name'], $row['job'], $row['description'], $row['image']);
                }
            else{
                echo 'nothing in team';
            }
            ?>
        </div>
    </div>
</section>
<!--end team-->
<section class="discover-our-story" >
    <div class="container">
        <div class="restaurant-info">
     <div class="restaurant-description padding-right animate-left">
        <div class="global-headline">
            <h2 class="sub-headline">
                <span class="first-letter">G</span>lobal
            </h2>
            <h1 class="headline headline-dark">Events</h1>
            <div class="asterisk"><i class="fas fa fa-asterisk"></i></div>
        </div>
        <p>
            lorem ipsum dolar sit amet. consectetur adihkjhhgn ,husnhusnjuhsks jshuemklahhsd hduukwkannjs
            jsjs nnjjdn skisnllssjm. juwunsmlsljsbnmskknsusmsksmms
            bhjsjmshhjmdmjjd.orem ipsum dolar sit amet. consectetur adihkjhhgn ,husnhusnjuhsks jshuemklahhsd hduukwkannjs
            jsjs nnjjdn skisnllssjm. juwunsmlsljsbnmskknsusmsksmms
            bhjsjmshhjmdmjjd.
        </p>
    </div>
    <div class="img-slider">
        <div class="slide active">
            <img src="images/47b06e6ad2982a4407e696128b21b308.jpg" alt="">
            <div class="info">
                <h2>Slide 01</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="slide">
            <img src="images/blog2.jpg" alt="">
            <div class="info">
                <h2>Slide 02</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="slide">
            <img src="images/blog1.jpg" alt="">
            <div class="info">
                <h2>Slide 03</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="slide">
            <img src="images/blog1%20(2).jpg" alt="">
            <div class="info">
                <h2>Slide 04</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="slide">
            <img src="images/708e5aedf5f05d991fcd5fefdb6ba2b3.jpg" alt="">
            <div class="info">
                <h2>Slide 05</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="navigation">
            <div class="btn active"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
        </div>
    </div>

    <script type="text/javascript">
        var slides = document.querySelectorAll('.slide');
        var btns = document.querySelectorAll('.btn');
        let currentSlide = 1;

        // Javascript for image slider manual navigation
        var manualNav = function(manual){
            slides.forEach((slide) => {
                slide.classList.remove('active');

                btns.forEach((btn) => {
                    btn.classList.remove('active');
                });
            });

            slides[manual].classList.add('active');
            btns[manual].classList.add('active');
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                manualNav(i);
                currentSlide = i;
            });
        });

        // Javascript for image slider autoplay navigation
        var repeat = function(activeClass){
            let active = document.getElementsByClassName('active');
            let i = 1;

            var repeater = () => {
                setTimeout(function(){
                    [...active].forEach((activeSlide) => {
                        activeSlide.classList.remove('active');
                    });

                    slides[i].classList.add('active');
                    btns[i].classList.add('active');
                    i++;

                    if(slides.length == i){
                        i = 0;
                    }
                    if(i >= slides.length){
                        return;
                    }
                    repeater();
                }, 10000);
            }
            repeater();
        }
        repeat();
    </script>
        </div>
    </div>
</section>
<!-- footer -->
<footer>
    <div class="container">
        <div class="back-to-top">
            <a href="#h"><i class="fas fa-chevron-up"></i></a>
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