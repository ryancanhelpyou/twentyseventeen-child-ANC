<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php
if ( is_active_sidebar( 'sidebar-2' ) ||
	 is_active_sidebar( 'sidebar-3' ) ) :
?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'twentyseventeen' ); ?>">
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div class="widget-column footer-widget-1">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php } ?>

		<div class="site-info">
			&copy; <?php echo date("Y"); ?> <a href="<?php echo esc_url( __( 'https://www.armynavyclub.org/', 'twentyseventeen' ) ); ?>"><?php printf( __( 'The Army and Navy Club', 'twentyseventeen' ) ); ?></a>
		</div><!-- .site-info -->
		<div class="footer-nav">
			<?php
			if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
				<div class="widget-column footer-widget-2">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php } ?>
		</div><!-- .site-info -->
	</aside><!-- .widget-area -->

<?php endif; ?>
