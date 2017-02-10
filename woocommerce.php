<?php get_header(); ?>
  <div class="wrap">
      <div class="slider" id="showcase">
        <?php masterslider(3); ?>
      </div>
    <?php if ( is_singular( 'product' ) ) : ?>
        <div id="shop" class="container">
          <?php woocommerce_content(); ?>
        </div>
      <?php else : ?>
        <div id="shoppage">
          <?php woocommerce_get_template( 'archive-product.php' ); ?>
        </div>
      <?php endif; ?>
  </div>
<?php get_footer(); ?>
