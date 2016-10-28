<?php
/**
 * Template Name: Home page
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aroundaboutway
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<?php echo GeoMashup::map( 'map_content=global&zoom=2&width=100%&height=400&map_type=G_HYBRID_MAP&auto_info_open=false&enable_scroll_wheel_zoom=false&enable_street_view=false&remove_geo_mashup_logo=true&marker_select_highlight=false&center_lat=25.33&center_lng=65.03' ); ?>

			<section class="home-posts-list">
			<header>
				<h1 class="home-posts-list-title">All the posts from start to end</h1>
			</header>
			<?php

			$args = array( 'posts_per_page' => 50, 'offset'=> 0, 'order' => 'ASC' );

			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
				<article class="post-list-item">
					<header>
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					</header>
					<footer>
					<p><?php the_date(); ?></p>
					<p><?php $key="places"; echo get_post_meta($post->ID, $key, true); ?></p>
					</footer>
				</article>
			<?php endforeach; 
			wp_reset_postdata();?>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
