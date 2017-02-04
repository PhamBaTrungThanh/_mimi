<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

?>

  <?php
    /**
     * woocommerce_before_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     */
    //do_action( 'woocommerce_before_main_content' );
    //woocommerce_output_content_wrapper();
  ?>
  <?php
    /**
     * woocommerce_sidebar hook.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    //do_action( 'woocommerce_sidebar' );
  ?>
  <div class="container">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
      <div class="row hidden-md-down" id="main-categories">
        <div class="col">
          <ul class="mimi--woo categories-selector">
            <li <?php if ( is_shop() ) : ?>class="current-cat"<?php endif; ?>><a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>">Tất cả</a></li>
            <?php wp_list_categories(['taxonomy' => 'product_cat', 'hide_empty' => 0, 'title_li' => '', 'depth' => 1]); ?>

            <li class="product_search"><div class="search-icon">
              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 463.001 463.001" style="enable-background:new 0 0 463.001 463.001;" xml:space="preserve" width="20px" height="20px"> 
                <g>
                  <path d="M0,203.25c0,112.1,91.2,203.2,203.2,203.2c51.6,0,98.8-19.4,134.7-51.2l129.5,129.5c2.4,2.4,5.5,3.6,8.7,3.6
                    s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-129.6-129.5c31.8-35.9,51.2-83,51.2-134.7c0-112.1-91.2-203.2-203.2-203.2
                    S0,91.15,0,203.25z M381.9,203.25c0,98.5-80.2,178.7-178.7,178.7s-178.7-80.2-178.7-178.7s80.2-178.7,178.7-178.7
                    S381.9,104.65,381.9,203.25z"/>
                </g>
              </svg>
            </div>

              <form role="search" method="get" class="woocommerce-product-search" action="">
                <label class="screen-reader-text" for="woocommerce-product-search-field">Search for:</label>
                <input id="woocommerce-product-search-field" class="search-field" placeholder="Tìm kiếm…" value="" name="s" title="Search for:" type="search">
                <input value="Search" type="submit">
                <input name="post_type" value="product" type="hidden">
              </form>
            </li>
          </ul>
        </div>
        <div id="filter-button">
          <a href="#filter" id="filter-button-action">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 368.167 368.167" style="enable-background:new 0 0 368.167 368.167;" xml:space="preserve" width="35px" height="35px">
              <path id="filter-path-1" class="filter-icon-svg" d="M248.084,96.684h12c4.4,0,8-3.6,8-8c0-4.4-3.6-8-8-8h-12c-4.4,0-8,3.6-8,8C240.084,93.084,243.684,96.684,248.084,96.684     z" fill="rgba(0, 0, 0, 0.4)"/>
              <path id="filter-path-2" class="filter-icon-svg" d="M366.484,25.484c-2.8-5.6-8.4-8.8-14.4-8.8h-336c-6,0-11.6,3.6-14.4,8.8c-2.8,5.6-2,12,1.6,16.8l141.2,177.6v115.6     c0,6,3.2,11.2,8.4,14c2.4,1.2,4.8,2,7.6,2c3.2,0,6.4-0.8,9.2-2.8l44.4-30.8c6.4-4.8,10-12,10-19.6v-78.8l140.8-177.2     C368.484,37.484,369.284,31.084,366.484,25.484z M209.684,211.884c-0.8,1.2-1.6,2.8-1.6,4.8v81.2c0,2.8-1.2,5.2-3.2,6.8     l-44.4,30.8v-118.8c0-2.8-1.2-5.2-3.2-6.4l-90.4-113.6h145.2c4.4,0,8-3.6,8-8c0-4.4-3.6-8-8-8h-156c-0.4,0-1.2,0-1.6,0l-38.4-48     h336L209.684,211.884z" fill="rgba(0, 0, 0, 0.4)"/>
            </svg>
          </a>
        </div>
      </div>
      <div class="row hidden-lg-up" id="filter_panel">
        <div class="col-xs">
          <?php woocommerce_catalog_ordering(); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs">
          <h1 class="section-title"><?php woocommerce_page_title(); ?></h1>
        </div>
      </div>
    <?php endif; ?>

    <?php
      /**
       * woocommerce_archive_description hook.
       *
       * @hooked woocommerce_taxonomy_archive_description - 10
       * @hooked woocommerce_product_archive_description - 10
       */
      do_action( 'woocommerce_archive_description' );
    ?>
    <div class="row">
      <div class="col-xs">
            <?php
              /**
               * woocommerce_before_shop_loop hook.
               *
               * @hooked woocommerce_result_count - 20
               * @hooked woocommerce_catalog_ordering - 30
               */
              //do_action( 'woocommerce_before_shop_loop' );
            ?>
            <p>First code line of 2017</p>
      </div>
    </div>
    <div class="row product-grid">
        <?php if ( have_posts() ) : ?>
          <div class="grid-sizer col-sm-12 col-md-6 col-lg-3"></div>
            
            <?php while ( have_posts() ) : the_post(); ?>

              <?php wc_get_template_part( 'content', 'product' ); ?>

            <?php endwhile; // end of the loop. ?>

          <?php
            /**
             * woocommerce_after_shop_loop hook.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action( 'woocommerce_after_shop_loop' );
          ?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
          <div class="col-xs">
            <?php wc_get_template( 'loop/no-products-found.php' ); ?>
          </div>
        <?php endif; ?> 
    </div>

    <?php
      /**
       * woocommerce_after_main_content hook.
       *
       * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
       */
      do_action( 'woocommerce_after_main_content' );
    ?>

  </div>

  <script type="text/javascript">
    (function($) { 
      // code using $ as alias to jQuery
      $(function() {
        $('#filter-button-action').on('click', function() {
          $('#filter_panel').toggleClass('show');
          $('#filter-button-action').toggleClass('active');
        });
        var productGrid = new Masonry('.product-grid', {
          itemSelector: '.grid-item', // use a separate class for itemSelector, other than .col-
          columnWidth: '.grid-sizer',
          percentPosition: true,
          gutter: 0
        });
        console.log('document loaded');
      });
    })(jQuery);
    // other code using $ as an alias to the other library
  </script>
<?php //get_footer( 'shop' ); ?>
