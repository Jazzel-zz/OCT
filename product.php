
    <?php
    // start session
    session_start();

    // include classes
    include_once "config/database.php";
    include_once "objects/product.php";
    include_once "objects/product_image.php";
    include_once "objects/category.php";

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // initialize objects
    $product = new Product($db);
    $category = new Category($db);
    $product_image = new ProductImage($db);

    // set page title
    $page_title = "Product Details";

    // include page header HTML
    include_once 'base_header.php';


    echo '<div class="container"><br /><h1 style="color:white">Product Details</h1><hr /> <br />';
    // get ID of the product to be edited
    $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

    // set the id as product id property
    $product->id = $id;

    // to read single record product
    $product->readOne();

    // set page title
    $page_title = $product->name;

    // set product id

    // read all related product image


    echo "<div class='col-md-1'>";
    // if count is more than zero
    if ($product->image != null) {
        // loop through all product images
        // image name and source url
        $product_image_name = $product->image;
        $source = "uploads/{$product_image_name}";
        echo "<img src='{$source}' class='product-img-thumb mt-1' data-img-id='{$id}' />";
    } else {
        echo "No images.";
    }
    echo "</div>";

    echo "<div class='col-md-4' id='product-img'>";

    // read all related product image
    $stmt_product_image = $product_image->readByProductId();
    $num_product_image = $stmt_product_image->rowCount();

    // if count is more than zero
    if ($product->image != null) {
        // loop through all product images
        // image name and source url
        $product_image_name = $product->image;

        $source = "uploads/{$product_image_name}";
        echo "<a href='{$source}' target='_blank' style='padding-bottom:5px;' id='product-img-{$id}' class='product-img'>";
        echo "<img src='{$source}' style='width:100%;' />";
        echo "</a>";
    } else {
        echo "No images.";
    }
    echo "</div>";

    echo "<div class='col-md-5' style='color:white'>";

    echo "<div class='product-detail'>Price:</div>";
    echo "<h4 class='m-b-10px price-description'>&#36;" . number_format($product->price, 2, '.', ',') . "</h4>";

    echo "<div class='product-detail'>Product description:</div>";
    echo "<div class='m-b-10px'>";
    // make html
    $page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->description));
    $category_id = htmlspecialchars_decode(htmlspecialchars_decode($product->category_id));
    $category->id = $category_id;
    $category->readName();
    $category_name = $category->name;

    // show to user
    echo $page_description;
    echo "</div>";

    echo "<div class='product-detail'>Product category:</div>";
    echo "<div class='m-b-10px'>" . $category_name . "</div>";

    echo "</div>";

    echo "<div class='col-md-2'>";

    // if product was already added in the cart
    if (array_key_exists($id, $_SESSION['cart'])) {
        echo "<div style='color:white' class='m-b-10px'>This product is already in your cart.</div>";
        echo "<a href='cart.php'  style='color:white;background: rgb(198,82,231)' class='btn btn w-100-pct'>";
        echo "Update Cart";
        echo "</a>";
    }

    // if product was not added to the cart yet
    else {

        echo "<form class='add-to-cart-form'>";
        // product id
        echo "<div class='product-id display-none'>{$id}</div>";

        echo "<div class='m-b-10px f-w-b'>Quantity:</div>";
        echo "<input type='number' value='1' class='form-control m-b-10px cart-quantity' min='1' />";

        // enable add to cart button
        echo "<button style='width:100%;background-color:rgb(198,82,231);color:white;margin-top:5px;' type='submit' class='btn text-white add-to-cart m-b-10px'>";
        echo "<span class='fa fa-shopping-cart'></span> Add to cart";
        echo "</button>";

        echo "</form>";
    }
    echo "</div>";
    echo "</div><br /><br /><br />";

    // content will be here

    // include page footer HTML
    include_once 'base_footer.php'; ?>