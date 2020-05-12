<?php
// start session
session_start();

// remove items from the cart
unset($_SESSION['cart']);

// set page title
$page_title = "Thank You!";

// include page header HTML
include_once 'base_header.php';

echo '<br><br><div class="container">';


echo "<div class='col-md-12'>";

// tell the user order has been placed
echo "<div class='alert alert-success'>";
echo "<strong>Your order has been placed!</strong> Thank you very much!";
echo "</div>";

echo "</div>";

echo "</div>";

// include page footer HTML
include_once 'base_footer.php';
