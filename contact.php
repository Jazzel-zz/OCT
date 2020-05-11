   <?php
   session_start();


   // core.php holds pagination variables
   $page_title = "Contact";


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
         <h1 style='color:white'>Contact Us</h1>
      </div>
   </div>
   <br />
   <br />
   <div class="vincent_container vincent_сontact_us">
      <div class="row gutters">
         <div class="col col-8 vincent_content">
            <div class="row vincent_сontact_block">
               <div class="col col-6 vincent_сontact_block_img"><img src="assets/base/img/img_1.jpg" alt=""></div>
               <div class="col col-6 vincent_сontact_block_content">
                  <h5>Brooklin</h5>
                  <p>St Johns Pl/Nostrand Av, Brooklyn, NY 11216, USA</p>
                  <p>+1 215 456 15 15</p>
                  <p class="vincent_сontact_mail">brooklyn@vincent.com</p>
                  <h5>WORKING HOURS</h5>
                  <p>Monday – Friday from 8:00 am to 11:30 pm</p>
                  <p>Weekends from 9:00 am to 11:00 pm</p>
                  <a class="vincent_button" href="#">Get Directions<i class="fa fa-angle-right" aria-hidden="true"></i></a>
               </div>
            </div>
            <div class="row vincent_сontact_block">
               <div class="col col-6 vincent_сontact_block_img"><img src="assets/base/img/img_2.jpg" alt=""></div>
               <div class="col col-6 vincent_сontact_block_content">
                  <h5>Queens</h5>
                  <p>Hillside Av/162 St, Queens, NY, Queens, 11432</p>
                  <p>+1 079 385 4690</p>
                  <p class="vincent_сontact_mail">queens@vincent.com</p>
                  <h5>WORKING HOURS</h5>
                  <p>Monday – Friday from 8:00 am to 11:30 pm</p>
                  <p>Weekends from 9:00 am to 11:00 pm</p>
                  <a class="vincent_button" href="#">Get Directions<i class="fa fa-angle-right" aria-hidden="true"></i></a>
               </div>
            </div>
            <div class="row vincent_сontact_block">
               <div class="col col-6 vincent_сontact_block_img"><img src="assets/base/img/img_3.jpg" alt=""></div>
               <div class="col col-6 vincent_сontact_block_content">
                  <h5>New Jersey</h5>
                  <p>172 Park Ave, East Orange, NJ 07017, USA</p>
                  <p>+1 215 456 15 15</p>
                  <p class="vincent_сontact_mail">newjersey@vincent.com</p>
                  <h5>WORKING HOURS</h5>
                  <p>Monday – Friday from 8:00 am to 11:30 pm</p>
                  <p>Weekends from 9:00 am to 11:00 pm</p>
                  <a class="vincent_button" href="#">Get Directions<i class="fa fa-angle-right" aria-hidden="true"></i></a>
               </div>
            </div>
            <iframe style="width:100%; margin-bottom:65px;" class="pm-gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1184224942954!2d-73.93064768436976!3d40.75942004264959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQ1JzMzLjkiTiA3M8KwNTUnNDIuNSJX!5e0!3m2!1sru!2sua!4v1556096427906!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            <h5 class="vincent_form_title">Drop us a LIne</h5>
            <div class="vincent_form_block ">
               <form class="vincent_form">
                  <input type="text" class="form_user-name " name="name" placeholder="Your Name">
                  <input type="text" class="form_email" name="email" placeholder="Your Email">
                  <textarea class="form_comment" name="message" placeholder="Your Message"></textarea>
                  <input class="" type="submit" value="Send Message">
               </form>
            </div>
         </div>
         <div class="col col-4 vincent_sidebar">

            <div class="vincent_sidebar_block vincent_sidebar_categories">
               <h5>Blog Categories</h5>
               <ul>
                  <li><a href="category.html">Food</a></li>
                  <li><a href="category.html">Inspiration</a></li>
                  <li><a href="category.html">Lifestyle</a></li>
                  <li><a href="category.html">People</a></li>
                  <li><a href="category.html">Recipes</a></li>
                  <li><a href="category.html">World</a></li>
               </ul>
            </div>
            <div class="vincent_sidebar_block vincent_sidebar_tags">
               <h5>Tags</h5>
               <ul>
                  <li><a href="category.html">Blog</a></li>
                  <li><a href="category.html">Food</a></li>
                  <li><a href="category.html">Lifestyle</a></li>
                  <li><a href="category.html">Margherita</a></li>
                  <li><a href="category.html">Pizza</a></li>
                  <li><a href="category.html">Pizzeria</a></li>
                  <li><a href="category.html">Restaurant</a></li>
                  <li><a href="category.html">Vincent</a></li>
               </ul>
            </div>
            <div class="vincent_sidebar_block">
               <h5>Instafeed</h5>
               <ul class="vincent_sidebar_instafeed">
                  <li><a class="vincent_image_fader" href="https://instagram.com/p/BSk1sbJFPDL/">
                        <img src="assets/base/img/17817627_1991094447779194_2141034917813813248_n.jpg" alt="">
                     </a></li>
                  <li><a class="vincent_image_fader" href="https://instagram.com/p/BSk1mfglkeK/">
                        <img src="assets/base/img/17596453_1394335877325424_5306473291534303232_n.jpg" alt="">
                     </a></li>
                  <li><a class="vincent_image_fader" href="https://instagram.com/p/BSk1lf1FbB7/">
                        <img src="assets/base/img/17662462_240934883045697_4488760463823208448_n.jpg" alt="">
                     </a></li>
                  <li><a class="vincent_image_fader" href="https://instagram.com/p/BSk1kROFVaq/">
                        <img src="assets/base/img/17663134_213463345806971_2661189821392748544_n.jpg" alt="">
                     </a></li>
                  <li><a class="vincent_image_fader" href="https://instagram.com/p/BSk1jg2l_ui/">
                        <img src="assets/base/img/17663740_2273891269502238_7837518096255418368_n.jpg" alt="">
                     </a></li>
                  <li><a class="vincent_image_fader" href="https://instagram.com/p/BSk1in3lBNE/">
                        <img src="assets/base/img/17818827_1383669068365197_1027011360048807936_n.jpg" alt="">
                     </a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <?php include_once('./base_footer.php'); ?>