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
	$object_title = get_post_meta(get_the_ID(), 'object_title', true);
	$accessnum = get_post_meta(get_the_ID(), 'accession_number', true);
	$term_list = wp_get_post_terms($post->ID, 'maker', array("fields" => "names"));
	$onview = get_post_meta(get_the_ID(), 'on_view', true);
	$hisperiod = get_post_meta(get_the_ID(), 'historical_period', true);
	$dims = get_post_meta(get_the_ID(), 'dimensions', true);
	$acqdate = get_post_meta(get_the_ID(), 'acquisition_date', true);
	$credline = get_post_meta(get_the_ID(), 'credit_line', true);
	$provenance = wpautop(get_post_meta(get_the_ID(), 'provenance', true));
	$label = wpautop(get_post_meta(get_the_ID(), 'label', true));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' !== get_the_post_thumbnail()  ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
				if ( is_single() ) {
					twentyseventeen_posted_on();
				} else {
					echo twentyseventeen_time_link();
					twentyseventeen_edit_link();
				};
			echo '</div><!-- .entry-meta -->';
		};

		if ( is_single() ) {
			// the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<h1 class="entry-title"><?php the_field('object_title'); ?></h1>
			<?php
			// echo '<h1 class="entry-title">' . $object_title . '</h1>';
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<p><span class="label">Accession number:</span><br>
				<?php if ($accessnum) { echo $accessnum; } else { echo 'N/A'; } ?>
		</p>

		<?php
			echo '<p><span class="label">Maker:</span>';
			if( have_rows('maker_details') ):
			    while ( have_rows('maker_details') ) : the_row();
							$name = get_sub_field('name');
							if ($name) {
								echo '<br>';
								echo '<a href="/' . $name->taxonomy . '/' . $name->slug . '">';
								echo $name->name;
								echo '</a>';
							} else {
								 echo '<br>N/A';
							}
							$notes = get_sub_field('notes');
							if ($notes) {
								echo '<br>';
								echo $notes;
							}
			    endwhile;
			else :
			   echo 'N/A';
			endif;
			echo '</p>'; ?>

			<p><span class="label">Currently on view:</span><br>
					<?php if ($onview) { echo $onview; } else { echo 'N/A'; } ?>
			</p>
			<p><span class="label">Historical period:</span><br>
					<?php if ($hisperiod) { echo $hisperiod; } else { echo 'N/A'; } ?>
			</p>

			<?php
			the_terms( $post->ID, 'military_branch', '<p><span class="label">Miltary branch:</span><br>', ', ', '</p>' );
			the_terms( $post->ID, 'wars_conflicts', '<p><span class="label">Wars and Conflicts:</span><br>', ', ', '</p>' );
			the_terms( $post->ID, 'object_type', '<p><span class="label">Type:</span><br>', ', ', '</p>' );
			?>

		<p><span class="label">Dimensions:</span><br>
				<?php if ($dims) { echo $dims; } else { echo 'N/A'; } ?>
		</p>
		<p><span class="label">Acquisition date:</span><br>
				<?php if ($acqdate) { echo $acqdate; } else { echo 'N/A'; } ?>
		</p>
		<p><span class="label">Credit line:</span><br>
				<?php if ($credline) { echo $credline; } else { echo 'N/A'; } ?>
		</p>

		<?php
			the_terms( $post->ID, 'location', '<p><span class="label">Location:</span><br>', ', ', '</p>' ); ?>

		<p><span class="label">Provenance:</span><br />
				<?php if ($provenance) { echo $provenance; } else { echo 'N/A'; } ?>
		</p>
		<p><span class="label">Label:</span><br />
				<?php if ($label) { echo $label; } else { echo 'N/A'; } ?>
		</p>

		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			get_the_title()
		) );

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
