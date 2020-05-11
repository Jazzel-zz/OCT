<?php

// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$product = new Product($db);
$category = new Category($db);
// set page headers
$page_title = "Create Product";
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

                    if (isset($_SESSION)) {
                        include_once 'authentication.php';
                    };



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
                        if ($product->create()) {
                            echo "<div class='alert alert-success'>Product was created.</div>";
                            // try to upload the submitted file
                            // uploadPhoto() method will return an error message, if any.
                            echo $product->uploadPhoto();
                        }

                        // if unable to create the product, tell the user
                        else {
                            echo "<div class='alert alert-danger'>Unable to create product.</div>";
                        }
                    }
                    ?>


                    <!-- HTML form for creating a product -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">


                        <table class='table table-hover'>

                            <tr>
                                <td>Name</td>
                                <td><input type='text' name='name' class='form-control' /></td>
                            </tr>

                            <tr>
                                <td>Price</td>
                                <td><input type='number' name='price' class='form-control' /></td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td><textarea name='description' class='form-control'></textarea></td>
                            </tr>

                            <tr>
                                <td>Category</td>
                                <td>
                                    <?php
                                    // read the product categories from the database
                                    $stmt = $category->read();

                                    // put them in a select drop-down
                                    echo "<select class='form-control' name='category_id'>";
                                    echo "<option>Select category...</option>";

                                    while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        extract($row_category);
                                        echo "<option value='{$id}'>{$name}</option>";
                                    }

                                    echo "</select>";
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Photo</td>
                                <td><input type="file" name="image" /></td>
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