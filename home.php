<?php
/**
 * The homepage template file
 * @package mimi
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<div id="container" class="intro-effect-push animating-header only-once">
			<div class="header white-bg">
				<div class="bg-img"></div>
				<div class="title">
					<img src="<?= get_template_directory_uri() ?>/dist/images/logo-center-300x300.png" alt="" srcset="<?= get_template_directory_uri() ?>/dist/images/logo-center-300x300.png 300w, <?= get_template_directory_uri() ?>/dist/images/logo-center-150x150.png 150w, <?= get_template_directory_uri() ?>/dist/images/logo-center-180x180.png 180w, <?= get_template_directory_uri() ?>/dist/images/logo-center.png 500w" sizes="(max-width: 300px) 100vw, 300px" width="300" height="300">
				</div>
			</div>
		<button class="trigger" data-info="Xem tiếp"><span>Trigger</span></button>	
		<div id="primary" class="content">
			<main id="main" class="site-main" role="main">
				<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="<?= get_template_directory_uri(); ?>/dist/images/paralax-0.jpg" data-natural-width="2048" data-natural-height="1365">
					<div class="title-container d-flex align-items-center justify-content-center">
						<div class="title-content container">
							<h1 class="font-weight-light"><span><?php bloginfo( 'name' ); ?></span></h1>
							<h3 class="font-weight-light"><span><?php bloginfo( 'description' ); ?></span></h3>
						</div>						
					</div>

				</div>
				<div class="parallax-content container" id="page_link">
					<div class="row">
						<div id="linktoshop" class="col-md-4 offset-md-1 col-sm-12 offset-sm-0 card box reveal">
							<div class="card-block">
								<h4 class="card-title text-center">#Shop</h4>
								<p class="card-text">
									Lorem ipsum dolor sit amet, in incorrupte neglegentur usu, ius ipsum voluptatum ex. Mea te feugait recteque consectetuer. Unum consul omnesque ne nam, theophrastus complectitur sit ad. Vis eu soluta dolores, unum persius platonem has ea, vel ex homero maiorum. Iusto vocent regione mel ut.
								</p>
								<a href="/shop" class="btn btn-block btn-primary">Shop</a>
							</div>
						</div>
						<div id="linktoblog" class="col-md-4 offset-md-2 col-sm-12 offset-sm-0 card box reveal">
							<div class="card-block">
							<h4 class="card-title text-center">#Blog</h4>
								<p class="card-text">
									Lorem ipsum dolor sit amet, in incorrupte neglegentur usu, ius ipsum voluptatum ex. Mea te feugait recteque consectetuer. Unum consul omnesque ne nam, theophrastus complectitur sit ad. Vis eu soluta dolores, unum persius platonem has ea, vel ex homero maiorum. Iusto vocent regione mel ut.
								</p>
								<a href="/blog" class="btn btn-block btn-primary">Blog</a>
							</div>
						</div>					
					</div>
				</div>
				<div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="<?= get_template_directory_uri(); ?>/dist/images/paralax-1.jpg" data-natural-width="2048" data-natural-height="1365"></div>
				<div class="parallax-content container" id="page_link">
					<div class="row">
						<div class="col">
							More content can be put here
						</div>				
					</div>
				</div>
			</main><!-- #main -->
			
		</div><!-- #primary -->

	</div><!-- #container -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mimi' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'mimi' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'mimi' ), 'mimi', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

	<?php wp_footer(); ?>
	<script language="javascript">
		jQuery(".title-content > h1").fitText();
		jQuery(".title-content > h3").fitText(2);
		$('[data-parallax="scroll"]').parallax();
		window.sr = ScrollReveal();
		sr.reveal('#linktoshop', {reset: false, mobile: false, duration: 1000});
		sr.reveal('#linktoblog', {reset: false, mobile: false, duration: 1000});
	</script>
</body>
</html>