<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">
		
		<?php
		if ( have_posts() ) : ?>
			<section class="background-archive">
				<div class="background-overlay"></div>
				<div class="elementor-shape elementor-shape-bottom" data-negative="true">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
						<path class="elementor-shape-fill" d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z"></path>
					</svg>		
				</div>

				<div class="header-titre container">
					<p>Blog</p>
					<div class="elementor-divider"></div>
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); 
					the_archive_description( '<div class="archive-description">', '</div>' ); ?>
				</div>	
			</section>

			<section class="content-page">
				<div class="container">
						
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'content', get_post_format() );

					endwhile;

					the_posts_navigation();

					?>	
				</div>
			</section>
			<?php else :

				get_template_part( 'template-parts/content', 'none' );
				endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
