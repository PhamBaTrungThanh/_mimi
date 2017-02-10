<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mimi
 */
get_header(); ?>

	<div id="container" class="intro-effect-<?php the_field( 'post_intro_effect' ); ?> animating-header  only-once">
		<?php if ( "normal" !== get_field( 'post_intro_effect' ) ): ?>
		<div class="awesome-header">
			<div class="bg-img">
				<?php the_post_thumbnail('full'); ?>
			</div>
			<div class="awesome-title">
				<h1><?php the_title(); ?></h1>
				<p class="subline"><?php the_field( 'extra_post_description' ); ?></p>
				<p class="post-meta"></p>
			</div>
		</div>

		<button class="trigger" data-info="Xem tiếp"><span>Trigger</span></button>	
		<?php endif; ?>
		<div id="primary" class="content-area awesome-content">
			<main id="main" class="site-main container" role="main">
				<div class="row">
					<div class="col-12">
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', get_post_format() );

							the_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>					
					</div>
				</div>


			</main><!-- #main -->
		</div><!-- #primary -->
	</div>

<?php
	get_footer();
?>