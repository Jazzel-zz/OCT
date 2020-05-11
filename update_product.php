<?php
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare objects
$product = new Product($db);
$category = new Category($db);

// set ID property of product to be edited
$product->id = $id;

// read the details of product to be edited
$product->readOneToUpdate();

?>
<?php
// set page header
$page_title = "Update Product";
include_once "header.php";

?>
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header">

                    <?php

                    echo ('<div class="row pt-3 pl-3"><div class="col-3">');
                    echo ('<div class="h1 text-white styled-font">' . $page_title . '</div>');
                    echo ('</div>');
                    echo ('<div class="col">');
                    echo "<div class='right-button-margin'>";
                    echo "<a href='products.php' class='btn btn-primary pull-right'>";
                    echo "<i class='fa fa-chevron-left'></i> &nbsp; Back to list";
                    echo "</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    // if the form was submitted
                    if ($_POST) {

                        // set product property values
                        $product->name = $_POST['name'];
                        $product->price = $_POST['price'];
                        $product->description = $_POST['description'];
                        $product->category_id = $_POST['category_id'];
                        $image = !empty($_FILES["image"]["name"])
                            ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
                        $product->image = $image;

                        // create the product
                        if ($product->update()) {
                            echo "<div class='alert alert-success'>Product was update.</div>";
                            // try to upload the submitted file
                            // uploadPhoto() method will return an error message, if any.
                            echo $product->uploadPhoto();
                        }

                        // if unable to create the product, tell the user
                        else {
                            echo "<div class='alert alert-danger'>Unable to update product.</div>";
                        }
                    }
                    ?>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
                        <table class='table table-hover'>

                            <tr>
                                <td>Name</td>
                                <td><input type='text' name='name' value='<?php echo $product->name; ?>' class='form-control' /></td>
                            </tr>

                            <tr>
                                <td>Price</td>
                                <td><input type='number' name='price' value='<?php echo $product->price; ?>' class='form-control' /></td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td><textarea name='description' class='form-control'><?php echo $product->description; ?></textarea></td>
                            </tr>

                            <tr>
                                <td>Category</td>
                                <td>
                                    <?php
                                    $stmt = $category->read();

                                    // put them in a select drop-down
                                    echo "<select class='form-control' name='category_id'>";

                                    echo "<option>Please select...</option>";
                                    while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $category_id = $row_category['id'];
                                        $category_name = $row_category['name'];

                                        // current category of the product must be selected
                                        if ($product->category_id == $category_id) {
                                            echo "<option value='$category_id' selected>";
                                        } else {
                                            echo "<option value='$category_id'>";
                                        }

                                        echo "$category_name</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p> Current Image :</p>
                                </td>

                                <td>

                                    <img src="uploads/<?php echo $product->image; ?>" width="200" height="200" alt="">
                                </td>

                            </tr>

                            <tr>
                                <td>Update image</td>
                                <td><input type="file" name="image" /></td>
                                </td>
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
if (isset($_SESSION)) {
    include_once 'authentication.php';
};
?>