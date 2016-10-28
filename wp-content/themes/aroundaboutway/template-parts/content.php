<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aroundaboutway
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php aroundaboutway_posted_on(); ?>. <?php $key="places"; echo get_post_meta($post->ID, $key, true); ?>.
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aroundaboutway' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aroundaboutway' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php the_post_navigation(); ?>

	<?php echo GeoMashup::map( 'map_content=global&zoom=5&width=100%&height=200&map_type=G_HYBRID_MAP&auto_info_open=false&enable_scroll_wheel_zoom=false&enable_street_view=false&remove_geo_mashup_logo=true&marker_select_highlight=false' ); ?>

	<footer class="entry-footer">
		<?php aroundaboutway_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
