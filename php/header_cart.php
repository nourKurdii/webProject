<header>
    <div class="container">
        <nav class="nav">
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </div>
            <a href="index.html" class="logo">Takia</a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="index.html" class="nav-link active"> Home </a>
                </li>
                <li class="nav-item">
                    <a href="index.html" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="team.html" class="nav-link">Our Team</a>
                </li>
                <li class="nav-item">
                    <a href="menu.html" class="nav-link">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="contact.html" class="nav-link">Contact</a>
                </li>
                <li>
                    <a href="cart.php" class="nav-item nav-link active">
                        <h5 class="px-5 cart">
                            <i class="fas fa-shopping-cart"></i> Cart
                            <?php

                            if (isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                            }else{
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                            }

                            ?>
                        </h5>
                    </a>

                </li>
            </ul>

        </nav>
    </div>
</header>
