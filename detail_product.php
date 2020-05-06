<?php
// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

 
// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';
include_once "objects/product_image.php";

 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$product = new Product($db);
$category = new Category($db);
$product_image = new ProductImage($db);

 
// set ID property of product to be read
$product->id = $id;
 
// read the details of product to be read
$product->readOneToUpdate();

// set product id
$product_image->product_id=$id;
 
// read all related product image
$stmt_product_image = $product_image->readByProductId();
 
// count all relatd product image
$num_product_image = $stmt_product_image->rowCount();

// set page headers
$page_title = "Product Details";
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
    echo "<a href='products.php' class='btn btn-primary pull-right'>";
        echo "<i class='fa fa-chevron-left'></i> &nbsp; Back to list";
    echo "</a>";
echo "</div>";
        echo "</div>";
        echo "</div>";
// HTML table for displaying a product details
echo "<table class='table table-hover'>";
 
    echo "<tr>";
        echo "<td class='font-weight-bolder' style='color: white !important;'>Name</td>";
        echo "<td>{$product->name}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td class='font-weight-bolder' style='color: white !important;'>Price</td>";
        echo "<td>&#36;{$product->price}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td class='font-weight-bolder' style='color: white !important;'>Description</td>";
        echo "<td>{$product->description}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td class='font-weight-bolder' style='color: white !important;'>Category</td>";
        echo "<td>";
            // display category name
            $category->id=$product->category_id;
            $category->readName();
            echo $category->name;
        echo "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td class='font-weight-bolder' style='color: white !important;'>Image</td>";
        echo "<td>";
            echo "<div class='row' id='product-img'>";
 
            // read all related product image
            $stmt_product_image = $product_image->readByProductId();
            $num_product_image = $stmt_product_image->rowCount();
        
            // if count is more than zero
            if($num_product_image>0){
                // loop through all product images
                $x=0;
                while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
                    // image name and source url
                    $product_image_name = $row['name'];
                    $source="uploads/images/{$product_image_name}";
                    $show_product_img=$x==0 ? "display-block" : "display-none";
                    echo "<div class='col'>";
                    echo "<a href='{$source}' target='_blank' id='product-img-{$row['id']}' class='product-img {$show_product_img}'>";
                        echo "<img src='{$source}' />";
                    echo "</a>";
                    echo "</div>";
                    $x++;
                }
            }else{ echo "No images."; }
                echo "</div>";
            echo "</td>";
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
