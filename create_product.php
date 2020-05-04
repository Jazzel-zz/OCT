<?php

// include database and object files
include_once 'include/db_config.php';
include_once 'include/class.product.php';
include_once 'include/class.category.php';
 
// get database connection
$database = new DB_con();

$db = $database->getConnection();
 
// pass connection to objects
$product = new Product($db);
$category = new Category($db);


// set page headers
$page_title = "Create Product";
include_once "header.php";
 
// contents will be here
 echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Read Products</a>";
echo "</div>";
 
?>
<!-- 'create product' html form will be here -->
<?php
// footer
include_once "footer.php";
?>