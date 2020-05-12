<header class="vincent_header">
    <div class="row ">
        <div class="col col-3 vincent_header_left">
            <div class="vincent_inner">
                <div class="vincent_inner_h_contact">
                    <div class="vincent_h_phone" style="color:white">+1 215 456 15 15</div>
                    <div class="vincent_h_wh" style="color:white">8:00 am – 11:30 pm</div>
                </div>
            </div>
        </div>
        <div class="col col-6 vincent_header_center">
            <div class="vincent_def_header">
                <div class="vincent_logo_cont">
                    <a href="index.html" class="vincent_image_logo">
                    </a>
                </div>
                <nav class="vincent_menu_cont">
                    <ul id="menu-main-menu" class="vincent_menu">
                        <li class="menu-item <?php echo $page_title == "Home" ? "active" : ""; ?>"><a href="./index.php">Home</a>
                        </li>
                        <li class="menu-item <?php echo $page_title == "Products" ? "active" : ""; ?>"><a href="./discover.php">Products</a>
                        </li>
                        <li class="menu-item <?php echo $page_title == "About" ? "active" : ""; ?>"><a href="./about.php">About</a>
                        </li>

                        <li class="menu-item <?php echo $page_title == "Contact" ? "active" : ""; ?>"><a href="./contact.php">Contact</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['user_id'])) {
                            echo '<li><a style="color:white;" href="./login.php">Login</a></li>';
                            echo '<li><a style="color:white;" href="./signup.php">Register</a></li>';
                        } else {
                            echo '<li><a style="color:white;" class="nav-link" href="products.php?q=logout">Logout</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
            <div class="mobile_header ">
                <a href="index.html" class="vincent_image_logo"></a>
                <a href="javascript:void(0)" class="btn_mobile_menu">
                    <span class="vincent_menu_line1"></span>
                    <span class="vincent_menu_line2"></span>
                    <span class="vincent_menu_line3"></span>
                </a>
            </div>
        </div>
        <div class="col col-3 vincent_header_right">
            <div class="vincent_inner">
                <a href="cart.php">
                    <div class="vincent_shopping_cart">


                        <?php
                        // count products in cart
                        $cart_count = count($_SESSION['cart']);
                        ?>

                        <div class="vincent_total_price" style="padding-top:10px;">
                            Hello <?php !empty($_SESSION['user_id']) ? include_once('./getName.php') : ''; ?>
                        </div>
                        <div class="vincent_total_items">
                            <?php echo $cart_count; ?> items - View Cart</div>
                        <div class="vincent_cart_item_counter"><?php echo $cart_count; ?></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>