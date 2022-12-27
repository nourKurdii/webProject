<?php
function component($page,$productName,$productPrice,$productDiscreption,$productImage,$productId){
    $element="
     <form action=\"$page\" method=\"post\">
        <div class=\"single-menu\">
            <img src=\"$productImage\" alt=\"image1\">
            <div class=\"menu-content\">
                <h4>$productName</h4><h5><span>$$productPrice</span></h5>
                <p>$productDiscreption</p>
                <br>
                <h5>
                    <form id=\"rating-form\">
                       <span class=\"rating-star\">
                             <input type=\"radio\" name=\"rating\" value=\"5\"><span class=\"star\"></span>
                             <input type=\"radio\" name=\"rating\" value=\"4\"><span class=\"star\"></span>
                             <input type=\"radio\" name=\"rating\" value=\"3\"><span class=\"star\"></span>
                             <input type=\"radio\" name=\"rating\" value=\"2\"><span class=\"star\"></span>
                             <input type=\"radio\" name=\"rating\" value=\"1\"><span class=\"star\"></span>
                        </span>
                     </form>
                    <script type='text/javascript'>
                        $('#rating-form').on('change','[name=\"rating\"]',function(){
	                    $('#selected-rating').text($('[name=\"rating\"]:checked').val());
                            });

                    </script>
                </h5>
                <br>
                <button class=\"btn\" type=\"submit\" name=\"add\">Add To Cart<i class=\"fas fa-shopping-cart\"></i></button>
<!--                <a class=\"btn\">Add to cart</a>-->
                <input type='hidden' name='product_id' value='$productId'>
            </div>
        </div>
        </form>
    ";
    echo $element;
}
function cartElement($productImg,$productName,$productPrice,$productId){
    $element="
    <form action=\"cart.php?action=remove&id=$productId\" method=\"post\" class=\"cart-items\">

                    <div>
                        <div class=\"row single-menu\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=\"$productImg\" alt=\"image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h4 class=\"pt-2\">$productName</h4>
                                <h5 class=\"text-secondary\">Seller:daily tuition</h5>
                                <h4 class=\"pt-2\">$$productPrice</h4>
                                <button type=\"submit\" class=\"btn mx-2\" name=\"remove\" style=\"background-color: #c59d5f\">Remove</button>
                            </div>
                           <!--<div class=\"col-md-3 py-5\">
                                <div>                       
                                    <label for='amount'>Quantity</label>
                                    <input id='amount' type=\"number\" name='number' value=\"1\" class=\"form-control w-27 d-inline\" style=\"text-align: center\"
                                     min='1' step='1'>   
                                                               
                                </div>
                            </div> -->
                        </div>
                    </div>

                </form>
    ";
    echo $element;
}
function addToCart($page){
    if (isset($_POST['add'])){
        /// print_r($_POST['product_id']);
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], "product_id");

            if(in_array($_POST['product_id'], $item_array_id)){
                echo "<script>alert('Product is already added in the cart..!')</script>";
                echo "<script>window.location = '$page'</script>";
            }else{

                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_POST['product_id']
                );

                $_SESSION['cart'][$count] = $item_array;
            }

        }else{

            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            // Create new session variable
            $_SESSION['cart'][0] = $item_array;
//        print_r($_SESSION['cart']);
        }
    }
}
function teamcomponent($id,$name,$job,$descreption,$image){
    $element="  <div class=\"card\">
                <img  src=\"images/team.jpg\" alt=\"card_background\" class=\"card-img\">
                <img src=\"$image\" alt=\"profile_image\" class=\"profile-img\">
                <h1>$name</h1>
                <p class=\"job-title\">$job</p>
                <p class=\"team-about\">$descreption</p>
                <a href=\"\" class=\"team-btn\">Contact</a>
    <ul class=\"team-social-media\">
                    <li><a href=\"\"><i class=\"fab fa-facebook-square\"></i></a> </li>
                    <li><a href=\"\"><i class=\"fab fa-twitter-square\"></i></a> </li>
                    <li><a href=\"\"><i class=\"fab fa-instagram\"></i></a> </li>
                    <li><a href=\"\"><i class=\"fab fa-google-plus-square\"></i></a> </li>
                </ul>
            </div>
    ";
echo $element;
}