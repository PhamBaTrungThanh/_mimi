<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mimi
 */

?>


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="content row">
				<div class="col-xs-12 col-md-4"><?php dynamic_sidebar('sidebar-footer-left'); ?></div>
				<div class="col-xs-12 col-md-4"><?php dynamic_sidebar('sidebar-footer-center'); ?></div>
				<div class="col-xs-12 col-md-4"><?php dynamic_sidebar('sidebar-footer-right'); ?></div>
			</div>
		</div>
		<div id="copyright-info">
			<div class="container">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mimi' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'mimi' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'mimi' ), 'mimi', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?>
				</div><!-- .site-info -->
			</div>			
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
