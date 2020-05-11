   <?php
   session_start();


   // core.php holds pagination variables
   $page_title = "About";


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

   <div class="vincent_title_block vincent_corners">
      <div class="vincent_inner_text">
         <h1 style='color:white'>About US </h1>
      </div>
   </div>
   <div>
      <div class="row">
         <div class="col col-12 vincent_content">

            <div class="vincent_container vincent_content_title_block">
               <h2>We Are Vincent</h2>
               <img src="img/separator_light.png" alt="">
               <p>With more than 50 years of experience under our belts, we understand how to best serve our customers through tried and true service principles. Instead of following trends, we set <them class="Lorem"></them>.</p>
            </div>
            <div class="vincent_container vincent_branches">
               <div class="row gutters">
                  <div class="col col-6 vincent_branch">
                     <img src="img/img_6-1024x801.jpg" alt="">
                     <h4>Brooklyn</h4>
                     <p>St Johns Pl/Nostrand Av, Brooklyn, NY 11216, USA</p>
                     <p>+1 215 456 15 15 brooklyn@vincent.com</p>
                     <a class="vincent_button" href="#">Get Directions<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
                  <div class="col col-6 vincent_branch">
                     <img src="img/img_5-1024x801.jpg" alt="">
                     <h4>Queens</h4>
                     <p>Hillside Av/162 St, Queens, NY, Queens, New York 11432, USA </p>
                     <p>+1 079 385 4690 queens@vincent.com</p>
                     <a class="vincent_button" href="#">Get Directions<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </div>
               </div>
            </div>
            <div class="vincent_testimonials">
               <div class="vincent_container">
                  <h6>Not just a pizza, but Lifestyle</h6>
                  <h1>Our Clients say</h1>
                  <img class="vincent_single_img" src="img/separator_dark.png" alt="">
                  <div class="owl-carousel vincent_slider1i_auto_height">
                     <div class="vincent_testimonials_item">

                        <p>Vincent was one of the first restaurants I discovered upon moving to New York last summer, and it remains a favorite. Despite its sizable menu full of pastas, sandwiches, and pizzas, I almost always get the same thing – the Vincent pizza. It's made with Ricotta & Marinara sauces, spiced with oregano, and topped with eggplant, red onions, basil, Pecorino Romano & Mozzarella. It really is one of the best pizzas I've ever had – and I eat a lot of pizza.</p>
                        <div class="vincent_testimonials_author_cont">
                           <img src="img/testimonial_1-200x200.jpg" alt="">
                           <div class="vincent_testimonial_author">Adam Jefferson</div>
                           <div class="vincent_author_position">Lawyer, New York</div>
                        </div>
                     </div>
                     <div class="vincent_testimonials_item">

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ligula arcu, sodales sed purus ut, elementum eleifend lorem. Fusce eu turpis ac risus fringilla aliquam. Aliquam erat tortor, porttitor vel augue ac, tristique pulvinar est. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec nec egestas mi.</p>
                        <div class="vincent_testimonials_author_cont">
                           <img src="img/testimonial_2-200x200.jpg" alt="">
                           <div class="vincent_testimonial_author">Victoria Scott</div>
                           <div class="vincent_author_position">Designer, New York</div>
                        </div>
                     </div>
                     <div class="vincent_testimonials_item">

                        <p>Nulla vulputate diam id ligula consequat venenatis. Ut condimentum elementum turpis eget eleifend. Fusce viverra erat id diam faucibus accumsan. Vivamus semper venenatis velit. Sed consequat faucibus luctus. Nunc ut lectus ac justo hendrerit egestas. Duis mattis neque eget tellus sollicitudin posuere.</p>
                        <div class="vincent_testimonials_author_cont">
                           <img src="img/testimonial_3-200x200.jpg" alt="">
                           <div class="vincent_testimonial_author">Ann Smith</div>
                           <div class="vincent_author_position">Art Director, New York</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row vincent_partners">
               <div class="col col-2">
                  <a href="#">
                     <img src="img/partner_5.jpg" alt="">
                  </a>
               </div>
               <div class="col col-2">
                  <a href="#">
                     <img src="img/partner_4.jpg" alt="">
                  </a>
               </div>
               <div class="col col-2">
                  <a href="#">
                     <img src="img/partner_3.jpg" alt="">
                  </a>
               </div>
               <div class="col col-2">
                  <a href="#">
                     <img src="img/partner_2.jpg" alt="">
                  </a>
               </div>
               <div class="col col-2">
                  <a href="#">
                     <img src="img/partner_1.jpg" alt="">
                  </a>
               </div>
               <div class="col col-2">
                  <a href="#">
                     <img src="img/partner_6.jpg" alt="">
                  </a>
               </div>
            </div>
            <div class="vincent_container vincent_team">
               <h2>Meet our team</h2>
               <div class="row gutters">
                  <div class="col col-4">
                     <div class="vincent_team_item">
                        <div class="vincent_team_image">
                           <img src="img/team_1-1600x1600.jpg" alt="">
                           <div class="vincent_team_overlay"></div>
                           <ul class="vincent_social vincent_social_team">
                              <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href="https://www.pinterest.com"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                        <div class="vincent_team_description">
                           <h5>John Williams</h5>
                           <p>Manager</p>
                        </div>
                     </div>
                  </div>
                  <div class="col col-4">
                     <div class="vincent_team_item">
                        <div class="vincent_team_image">
                           <img src="img/team_2-1600x1600.jpg" alt="">
                           <div class="vincent_team_overlay"></div>
                           <ul class="vincent_social vincent_social_team">
                              <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href="https://www.pinterest.com"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                        <div class="vincent_team_description">
                           <h5>Sara Welch</h5>
                           <p>Marketing Head</p>
                        </div>
                     </div>
                  </div>
                  <div class="col col-4">
                     <div class="vincent_team_item">
                        <div class="vincent_team_image">
                           <img src="img/team_3-1600x1600.jpg" alt="">
                           <div class="vincent_team_overlay"></div>
                           <ul class="vincent_social vincent_social_team">
                              <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href="https://www.pinterest.com"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                        <div class="vincent_team_description">
                           <h5>Edward Gray</h5>
                           <p>Developer</p>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="vincent_button" href="team.html">View all stuff<i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
   </div>

   <?php include_once('./base_footer.php'); ?>