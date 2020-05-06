<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

 
// include database and object files
include_once 'config/database.php';
include_once 'objects/category.php';

 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$category = new Category($db);

 
// set ID property of product to be read
$category->id = $id;
 
// read the details of product to be read
$category->readOne();

// set page headers
$page_title = "Category Details";
include_once "header.php";
?>

  <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header">
<?php
 
 echo ('<div class="row pt-3 pl-3"><div class="col-3">');
        echo('<div class="h1 text-white styled-font">'.$page_title.'</div>');
        echo ('</div>');
        echo ('<div class="col">');
         echo "<div class='right-button-margin'>";
    echo "<a href='categories.php' class='btn btn-primary pull-right'>";
        echo "<i class='fa fa-chevron-left'></i> &nbsp; Back to list";
    echo "</a>";
echo "</div>";
        echo "</div>";
        echo "</div>";
// HTML table for displaying a product details
echo "<table class='table table-hover'>";
 
    echo "<tr>";
        echo "<td class='font-weight-bolder' style='color: white !important;'>Name</td>";
        echo "<td>{$category->name}</td>";
    echo "</tr>";
 
     echo "<tr>";
        echo "<td class='font-weight-bolder' style='color: white !important;'>Added by</td>";
        echo "<td>";
            // display category name
            $category->id=$category->user;
            $category->getUserName();
            echo $category->username;
        echo "</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td class='font-weight-bolder' style='color: white !important;'>Created on</td>";
        echo "<td>{$category->created_at}</td>";
    echo "</tr>";

 
   
 
echo "</table>";

 
// set footer
?>
  </div>
              </div>
              </div>
              </div>
              </div>
<?php
    if(isset($_SESSION)){
        include_once 'authentication.php';
    };
include_once "footer.php";

?> 
