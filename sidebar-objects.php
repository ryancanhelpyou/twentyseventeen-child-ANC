<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'twentyseventeen' ); ?>">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>

	<?php echo facetwp_display( 'facet', 'object_search' ); ?>
	<?php echo facetwp_display( 'facet', 'military' ); ?>
	<?php echo facetwp_display( 'facet', 'war_or_conflict' ); ?>
	<?php echo facetwp_display( 'facet', 'object_type_material' ); ?>
	<?php echo facetwp_display( 'facet', 'artist_maker' ); ?>
	<?php echo facetwp_display( 'facet', 'date' ); ?>

</aside><!-- #secondary -->
