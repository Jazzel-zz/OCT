<?php

// include database and object files
include_once 'config/database.php';
include_once 'objects/category.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$category = new Category($db);
// set page headers
$page_title = "Create Category";
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

    if(isset($_SESSION)){
        include_once 'authentication.php';
    };


 
if($_POST){
 
    // set product property values
    $category->name = $_POST['name'];
 
    // create the product
    if($category->create()){
        echo "<div class='alert alert-success'>Category was created.</div>";
        // try to upload the submitted file
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create category.</div>";
    }
}
?>

              
<!-- HTML form for creating a product -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

 
    <table class='table table-hover'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary pull-right">Create</button>
            </td>
        </tr>
 
    </table>
</form>
</div>
              </div>
              </div>
              </div>
              </div>
<?php
// footer
include_once "footer.php";
?>