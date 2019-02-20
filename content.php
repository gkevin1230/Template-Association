<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-wrap">
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="content-wrap">
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h3 class="entry-title">', '</h3>' );
				endif;
				?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
				if ( is_single() ) :
					the_content();
				else :
					the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
				endif;

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
						'after'  => '</div>',
					) );
				?>
			</div> <!-- .entry-content -->
			
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<span class="entry-meta-date">
						<i class="fa fa-calendar"></i>
						<?php echo get_the_date( 'd F Y' ); ?>		
					</span>
				</div>
			<?php endif; ?>
		</div> <!-- .content-wrap -->
	</div><!-- .inner-wrap -->
</article><!-- #post-## -->
