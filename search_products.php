<?php
// core.php holds pagination variables
include_once 'config/core.php';

// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/product_image.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$product_image = new ProductImage($db);

// get search term
$search_term = isset($_GET['s']) ? $_GET['s'] : '';

$page_title = "You searched for \"{$search_term}\"";
include_once "base_header.php";
?>

<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header" style="padding: 50px;">
                    <?php echo "<h1 style='color:white;'>" . $page_title . "</h1>" ?>
                    <hr>
                    <div class="row" style="padding: 100px;">
                        <?php


                        // query products
                        $pro_stmt = $product->searchByName($search_term, $from_record_num, $records_per_page);

                        // specify the page where paging is used
                        $page_url = "search_products.php?s={$search_term}&";

                        // count total rows - used for pagination
                        $total_rows = $product->countAll_BySearch($search_term);

                        while ($row = $pro_stmt->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            echo '<div class="col col-3">';
                            echo '  <div class="vincent_menu1_block_item">';
                            echo '      <div class="vincent_prod_list_image_cont">';
                            echo '          <div class="vincent_prod_list_image_wrapper">';

                            echo '              <div class="vincent_team_overlay"></div>';

                            echo "              <img src='uploads/{$image}'>";

                            echo "              <a class='vincent_add_to_cart_button' href='product.php?id={$id}'></a>";
                            echo '          </div>';
                            echo '      </div>';
                            echo "      <h5><a href='product.html' style='color:white'>{$name}</a></h5>";
                            echo "      <p class='vincent_prod_list_text'></p>";
                            echo "      <div class='vincent_prod_list_price' style='color:white'>$ {$price}</div>";
                            echo '  </div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

// layout_footer.php holds our javascript and closing html tags
include_once "base_footer.php";
?>

?>