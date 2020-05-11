 <div class="vincent_back_to_top"></div>
 <footer>
     <div class="vincent_container">
         <div class="row">
             <div class="col col-12">
                 <div class="vincent_logo_cont">
                     <a href="index.html" class="vincent_image_logo_footer">
                     </a>
                 </div>
                 <div class="vincent_foter_text">+1 215 456 15 15. <span>8:00 am – 11:30 pm</span></div>
                 <ul class="vincent_foter_menu">
                     <li><a style='color:white;' href="./index.php">Home</a></li>
                     <li><a style='color:white;' href="./discover.php">Products</a></li>
                     <li><a style='color:white;' href="./about.php">About</a></li>
                     <li><a style='color:white;' href="./contact.php">Contact</a></li>
                 </ul>
                 <ul class="vincent_social">
                     <li><a style='color:white;' href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li><a style='color:white;' href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                     </li>
                     <li><a style='color:white;' href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                     </li>
                 </ul>
                 <div class="vincent_copy_text">Copyright © 2018 Vincent. All Rights Reserved.</div>
             </div>
         </div>
     </div>
 </footer>
 <script src="assets/base/js/jquery-3.2.1.min.js"></script>
 <script src="assets/base/js/jquery.data-parallax.min.js"></script>
 <script src="assets/base/js/owl.carousel.min.js"></script>
 <script src="assets/base/js/kube.js"></script>
 <script src="assets/base/js/index.js"></script>

 <!-- Latest compiled and minified Bootstrap JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <script>
     $(document).ready(function() {
         // add to cart button listener
         $('.add-to-cart-form').on('submit', function() {

             // info is in the table / single product layout
             var id = $(this).find('.product-id').text();
             var quantity = $(this).find('.cart-quantity').val();

             // redirect to add_to_cart.php, with parameter values to process the request
             window.location.href = "add_to_cart.php?id=" + id + "&quantity=" + quantity;
             return false;
         });

         // update quantity button listener
         $('.update-quantity-form').on('submit', function() {

             // get basic information for updating the cart
             var id = $(this).find('.product-id').text();
             var quantity = $(this).find('.cart-quantity').val();

             // redirect to update_quantity.php, with parameter values to process the request
             window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;
             return false;
         });

         // change product image on hover
         $(document).on('mouseenter', '.product-img-thumb', function() {
             var data_img_id = $(this).attr('data-img-id');
             $('.product-img').hide();
             $('#product-img-' + data_img_id).show();
         });

     });
 </script>

 </body>

 </html>