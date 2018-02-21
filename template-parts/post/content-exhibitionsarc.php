<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>


<?php
// set variables
	$subtitle = get_post_meta(get_the_ID(), 'subtitle', true);
	$datesevents = wpautop(get_post_meta(get_the_ID(), 'dates_events', true));
	$finaldate = get_post_meta(get_the_ID(), 'final_display_date', true);
	$status = get_post_meta(get_the_ID(), 'status', true);
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<header class="entry-header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		<h3><?php echo $subtitle; ?></h3>
		<p><?php echo $datesevents ?></p>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		// the_content( sprintf(
		// 	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
		// 	get_the_title()
		// ) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		twentyseventeen_entry_footer();
	}
	?>

</article><!-- #post-## -->
