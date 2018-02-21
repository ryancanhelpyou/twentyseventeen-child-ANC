<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php
// set variables
	$status = get_post_meta(get_the_ID(), 'status', true);
?>



<div class="wrap">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	<?php
		// WP_Query arguments
		$today = date('Ymd');

		$args_current = array (
		    'post_type' => 'exhibitions',
		    'meta_query' => array(
			     array(
			        'key'		=> 'final_display_date',
			        'compare'	=> '>=',
			        'value'		=> $today,
			    )
		    ),
		);

		// The Query
		$querycurrent = new WP_Query( $args_current );

		// The Loop
		if ( $querycurrent->have_posts() ) {

			echo '<h1 class="page-title">Current Exhibitions</h1>';

			while ( $querycurrent->have_posts() ) {
				$querycurrent->the_post();
				// do something

				get_template_part( 'template-parts/post/content-exhibitionsarc', get_post_format() );

			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
	?>

<hr>

	<div class="past-exh">
	<?php
		$args_past = array (
				'post_type' => 'exhibitions',
				'meta_query' => array(
					 array(
							'key'		=> 'final_display_date',
							'compare'	=> '<',
							'value'		=> $today,
					)
				),
		);

		// The Query
		$querypast = new WP_Query( $args_past );

		// The Loop
		if ( $querypast->have_posts() ) {

			echo '<h1 class="page-title">Past Exhibitions</h1>';

			while ( $querypast->have_posts() ) {
				$querypast->the_post();
				// do something

				get_template_part( 'template-parts/post/content-exhibitionsarc', get_post_format() );

			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
	?>
</div>



			<?php

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php // get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
