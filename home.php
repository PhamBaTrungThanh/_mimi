<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mimi
 * Template Name: Blog Post Index
 */
?>
<?php get_header(); ?>


	
	<div id="primary">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-lg-8">
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>

							<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								if ( is_home() ) {
									get_template_part( 'template-parts/content', 'post-index' );
								}
								

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div>
					<div class="col-lg-4 hidden-lg-down">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->

					<?php
						get_footer();
					?>					
				</div>
			</div>

	</div><!-- #primary -->

</div><!-- #container -->