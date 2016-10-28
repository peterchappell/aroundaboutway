<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aroundaboutway
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-decoration">
			<span class="dot"></span><span class="dot"></span><span class="dot"></span>
		</div>
		<div class="site-info">
			<?php printf( esc_html__( 'All content and media copyright &copy; 2008 Susan and Pete, aroundaboutway.com.', 'aroundaboutway' )); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
