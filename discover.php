   <?php
    session_start();


    // core.php holds pagination variables
    $page_title = "Products";


    // include database and object files
    include_once 'config/database.php';
    include_once 'objects/category.php';
    include_once 'objects/product.php';
    include_once "objects/product_image.php";




    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();

    $category = new Category($db);
    $product = new Product($db);
    $product_image = new ProductImage($db);

    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    // for pagination purposes
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1

    $records_per_page = 6; // set records or rows of data per page
    $from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

    include_once('./base_header.php');


    ?>


   <div class="vincent_title_block vincent_corners">
       <div class="vincent_inner_text">
           <h1 style='color:white'>Discover Our Products</h1>
       </div>
   </div>

   <?php


    echo "<div class='col-md-12'>";
    if ($action == 'added') {
        echo "<div class='alert alert-info'>";
        echo "Product was added to your cart!";
        echo "</div>";
    }

    if ($action == 'exists') {
        echo "<div class='alert alert-info'>";
        echo "Product already exists in your cart!";
        echo "</div>";
    }
    echo "</div>";

    ?>


   <div class="row">
       <div class="col col-12 vincent_content">
           <div class="vincent_menu1_block">
               <div class="vincent_container">
                   <div class="container">
                       <ul class='tabs vincent_menu_tabs'>
                           <?php


                            // query products
                            $cat_stmt = $category->readAll($from_record_num, $records_per_page);

                            // specify the page where paging is used
                            $page_url = "categories.php?";

                            // count total rows - used for pagination
                            while ($row = $cat_stmt->fetch(PDO::FETCH_ASSOC)) {

                                extract($row);
                                echo "<li><a href='#{$id}'>{$name}</a></li>";
                            }
                            ?>
                       </ul>
                       <div class="vincent_sidebar_block vincent_search_block">
                           <form role='search' class="vincent_search_form" action='search_products.php'>
                               <?php $search_value = isset($search_term) ? "value='{$search_term}'" : "";

                                echo "<input type='text' name='s' placeholder='Search' required value='{$search_value}'>";
                                ?>
                               <span><i class="fa fa-search" aria-hidden="true"></i></span>
                               <button type="submit" class="btn btn-md btn-primary mb-2">Search</button>
                           </form>






                       </div>
                       <?php

                        $cat_stmt = $category->readAll($from_record_num, $records_per_page);


                        while ($row = $cat_stmt->fetch(PDO::FETCH_ASSOC)) {

                            extract($row);
                            $cat_id = "{$id}";
                            $pro_stmt = $product->readForPublic($cat_id);

                            echo "<div id='{$id}'>";
                            echo '<div class="row gutters">';
                            while ($row = $pro_stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                                $category_id = "{$category_id}";
                                if ($category_id == $cat_id) {
                                    echo '<div class="col col-3">';
                                    echo '  <div class="vincent_menu1_block_item">';
                                    echo '      <div class="vincent_prod_list_image_cont">';
                                    echo '          <div class="vincent_prod_list_image_wrapper">';

                                    echo '              <div class="vincent_team_overlay"></div>';
                                    $product_image->product_id = $id;
                                    $stmt_product_image = $product_image->readFirst();

                                    while ($row_product_image = $stmt_product_image->fetch(PDO::FETCH_ASSOC)) {
                                        echo "              <img src='uploads/images/{$row_product_image['name']}'>";
                                    }

                                    echo "              <a class='vincent_add_to_cart_button' href='product.php?id={$id}'></a>";
                                    echo '          </div>';
                                    echo '      </div>';
                                    echo "      <h5><a href='product.html' style='color:white'>{$name}</a></h5>";
                                    echo "      <p class='vincent_prod_list_text'></p>";
                                    echo "      <div class='vincent_prod_list_price' style='color:white'>$ {$price}</div>";
                                    echo '  </div>';
                                    echo '</div>';
                                }
                            }
                            echo "</div>";
                            echo "</div>";
                        }

                        ?>

                   </div>
               </div>

           </div>
           <div class="vincent_advantages">
               <div data-parallax='{"y":"45vh","scale":1,"rotate":0,"opacity":1}' class="vincent_parallax_background">
               </div>
               <div class="vincent_container">
                   <div class="row gutters">
                       <div class="col col-4">
                           <div class="vincent_advantages_item vincent_icon_box">
                               <img src="assets/base/img/icon_4.png" alt="">
                               <h4 style='color:white'>Quality Products</h4>
                               <p style='color:white'>Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero
                                   curabitur dapibus mauris sed leo cursus aliquetcras suscipit.</p>
                           </div>
                       </div>
                       <div class="col col-4">
                           <div class="vincent_advantages_item vincent_icon_box">
                               <img src="assets/base/img/icon_6.png" alt="">
                               <h4 style='color:white'>Chemical Free</h4>
                               <p style='color:white'>Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero
                                   curabitur dapibus mauris sed leo cursus aliquetcras suscipit.</p>
                           </div>
                       </div>
                       <div class="col col-4">
                           <div class="vincent_advantages_item vincent_icon_box">
                               <img src="assets/base/img/icons_7.png" alt="">
                               <h4 style='color:white'>Premier Choice </h4>
                               <p style='color:white'>Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero
                                   curabitur dapibus mauris sed leo cursus aliquetcras suscipit.</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <?php include_once('./base_footer.php'); ?>