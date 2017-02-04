<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php post_class('grid-item col-sm-12 col-md-6 col-lg-3'); ?>>
	<div class="grid-item-container">
		<div class="grid-item-content">
			<?php
			/*
			/**
			 * woocommerce_before_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			//do_action( 'woocommerce_before_shop_loop_item' );

			/**
			 * woocommerce_before_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			//do_action( 'woocommerce_before_shop_loop_item_title' );

			/**
			 * woocommerce_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			//do_action( 'woocommerce_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			//do_action( 'woocommerce_after_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			//do_action( 'woocommerce_after_shop_loop_item' ); 
			?>		
			<?php 
				echo '<a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">'; 
				wc_get_template( 'loop/rating.php' );
				echo '<div class="thumbnail-container">' . woocommerce_get_product_thumbnail() . '</div>';
			?>
				<div class="inside hidden-lg-down">
					<?php echo '<span class="product-title">' . get_the_title() . '</span>'; ?>
					<?php wc_get_template( 'loop/price.php' ); ?>					
				</div>
				<div class="outside hidden-lg-up">
					<?php echo '<h2>' . get_the_title() . '</h2>'; ?>
					<p><h4><?php wc_get_template( 'loop/price.php' ); ?></h4></p>
					<p><?php woocommerce_template_loop_add_to_cart(); ?></p>
				</div>
			</a>

		</div>
		<div class="grid-item-hover hidden-lg-down">
			<div class="top">
				<div class="item-icon" data-balloon="Đánh giá" data-balloon-pos="top"><?php wc_get_template( 'loop/rating.php' ); ?>&nbsp;</div>
				<div class="item-icon" data-balloon="Độc quyền" data-balloon-pos="top"><i class="icon-registered"></i></div>
				<div class="item-icon" data-balloon="Nhiều mẫu mã" data-balloon-pos="top"><i class="icon-gauge"></i></div>
			</div>
			<div class="right">
				<div class="item-icon" data-text="So sánh"><i class="icon-plus"></i></div>
				<div class="item-icon" data-text="Yêu thích"><i class="icon-heart"></i></div>	
				<div class="item-icon" data-text="Chia sẻ"><i class="icon-share"></i></div>
				<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="item-icon cart-link product_type_simple add_to_cart_button ajax_add_to_cart">%s</a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( isset( $quantity ) ? $quantity : 1 ),
							esc_attr( $product->id ),
							esc_attr( $product->get_sku() ),
							'<i class="icon-cart-plus"></i>'
						),
					$product );
				?>
			</div>
		</div>
	</div>
	
</div>
