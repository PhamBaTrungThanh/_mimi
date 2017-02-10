<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mimi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-index'); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail('medium_large'); ?>
				<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark" class="thumbnail-link"></a>
			<?php endif; ?>
			<div class="main-category">
				<?php primary_category_link(); ?>
			</div>
		</div>
		<?php endif; ?>
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mimi' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mimi' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php mimi_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
