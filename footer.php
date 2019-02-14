<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
	<?php get_template_part( 'footer-widget' ); ?>
		<div class="container copyright">
            <div class="site-info">
                &copy; Copyright tous droits réservés <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?> - <?php echo date('Y'); ?> 
                <span class="sep"> | </span>
                <a class="credits" href="https://www.dot-perfect.com" target="_blank" title="Dot Perfect" alt="Dot Perfect">Créé par Dot Perfect</a>

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>