<?php get_header(); ?>
  <div class="wrap">
    <?php if ( is_singular( 'product' ) ) {
        ?>
        <div id="shop" class="container">

          <?php woocommerce_content(); ?>
        </div>
      <?php 
      }else{
       //For ANY product archive.
       //Product taxonomy, product search or /shop landing
      ?>
      <div id="shoppage">
        <?php woocommerce_get_template( 'archive-product.php' ); ?>
      </div>
        <?php
      }
    ?>
  </div>
<?php get_footer(); ?>
