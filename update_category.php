<?php
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'config/database.php';
include_once 'objects/category.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$category = new Category($db);
 
// set ID property of product to be edited
$category->id = $id;
 
// read the details of product to be edited
$category->readOne();
 
?>
<?php
// set page header
$page_title = "Update Category";
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
// if the form was submitted
if($_POST){
 
    // set product property values
    $category->name = $_POST['name'];
 
    // create the product
    if($category->update()){
        echo "<div class='alert alert-success'>Category was update.</div>";
        // try to upload the submitted file
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to update category.</div>";
    }

}
?>
 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $category->name; ?>' class='form-control' /></td>
        </tr>
 
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
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
 

 
// set page footer
include_once "footer.php";
?>

<?php
    if(isset($_SESSION)){
        include_once 'authentication.php';
    };
?> 
