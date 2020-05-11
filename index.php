   <?php
   session_start();


   // core.php holds pagination variables
   $page_title = "Home";


   // include database and object files
   include_once 'config/database.php';
   include_once 'objects/product.php';
   include_once "objects/product_image.php";


   // instantiate database and product object
   $database = new Database();
   $db = $database->getConnection();

   $product = new Product($db);
   $product_image = new ProductImage($db);


   include_once('./base_header.php');

   ?>


   <style>
      * {
         color: white !important;
      }
   </style>


   <div class="owl-carousel vincent_slider1i vincent_corners">
      <div class="owl-item">
         <img src="assets/base/img/about_1-1.jpg" alt="">
      </div>
      <div class="owl-item">
         <img src="assets/base/img/about_2-1.jpg" alt="">
      </div>
      <div class="owl-item">
         <img src="assets/base/img/about_3-1.jpg" alt="">
      </div>
   </div>


   <div class="vincent_title_block vincent_corners">
      <div class="vincent_inner_text">
         <h1 style='color:white'>Hot Sales </h1>
      </div>
   </div>
   <div class="vincent_hot_sales">
      <div class="vincent_container vincent_menu1_block">
         <div class="row gutters">
            <div class="col col-3">
               <div class="vincent_menu1_block_item">
                  <a href="product.html">
                     <div class="vincent_prod_list_image_cont">
                        <div class="vincent_prod_list_image_wrapper">
                           <img src="img/6-600x600.png" alt="">
                        </div>
                     </div>
                     <h5>Diablo</h5>
                     <p class="vincent_prod_list_text">Classic marinara sauce, authentic old-<wbr>world pepperoni, all-natural Ita</p>
                     <div class="vincent_prod_list_price"><span>$</span>3.50</div>
                  </a>
               </div>
            </div>
            <div class="col col-3">
               <div class="vincent_menu1_block_item">
                  <a href="product.html">
                     <div class="vincent_prod_list_image_cont">
                        <div class="vincent_prod_list_image_wrapper">
                           <img src="img/8-600x600.png" alt="">
                        </div>
                     </div>
                     <h5>Carbonara</h5>
                     <p class="vincent_prod_list_text">Classic marinara sauce, authentic old-<wbr>world pepperoni, all-natural Ita</p>
                     <div class="vincent_prod_list_price"><span>$</span>3.80</div>
                  </a>
               </div>
            </div>
            <div class="col col-3">
               <div class="vincent_menu1_block_item">
                  <a href="product.html">
                     <div class="vincent_prod_list_image_cont">
                        <div class="vincent_prod_list_image_wrapper">
                           <img src="img/4-600x600.png" alt="">
                        </div>
                     </div>
                     <h5>Capricciosa</h5>
                     <p class="vincent_prod_list_text">Classic marinara sauce, authentic old-<wbr>world pepperoni, all-natural Ita</p>
                     <div class="vincent_prod_list_price"><span>$</span>2.90</div>
                  </a>
               </div>
            </div>
            <div class="col col-3">
               <div class="vincent_menu1_block_item">
                  <a href="product.html">
                     <div class="vincent_prod_list_image_cont">
                        <div class="vincent_prod_list_image_wrapper">
                           <img src="img/7-600x600.png" alt="">
                        </div>
                     </div>
                     <h5>Prosciutto</h5>
                     <p class="vincent_prod_list_text">Classic marinara sauce, authentic old-<wbr>world pepperoni, all-natural Ita</p>
                     <div class="vincent_prod_list_price"><span>$</span>3.50</div>
                  </a>
               </div>
            </div>

         </div>
         <br>
         <div class="row">
            <div class="col-5"></div>
            <h6 class="col-2"><a class="vincent_prod_list_text" href="./discover.php">View More > </a>
            </h6>
         </div>

      </div>
   </div>
   <div class="vincent_container vincent_content_title_block">
      <h2>We Are Vincent</h2>
      <img src="img/separator_light.png" alt="">
      <p>With more than 50 years of experience under our belts, we understand how to best serve our customers through tried and true service principles. Instead of following trends, we set <them class="Lorem"></them>.</p>
   </div>
   <div class="vincent_advantages vincent_corners">
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



   <?php include_once('./base_footer.php'); ?>