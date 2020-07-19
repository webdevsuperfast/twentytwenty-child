<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$has_footer_1 = is_active_sidebar( 'sidebar-1' );
$has_footer_2 = is_active_sidebar( 'sidebar-2' );
$has_footer_3 = is_active_sidebar( 'sidebar-3' );
$has_footer_4 = is_active_sidebar( 'sidebar-4' );

// Only output the container if there are elements to display.
if ( $has_footer_1 || $has_footer_2 || $has_footer_3 || $has_footer_4 ) {
	?>

	<div class="footer-nav-widgets-wrapper header-footer-group">

		<div class="footer-inner section-inner">

			<?php if ( $has_footer_1 || $has_footer_2 || $has_footer_3 || $has_footer_4 ) { ?>

				<aside class="footer-widgets-outer-wrapper" role="complementary">

					<div class="footer-widgets-wrapper">

						<?php if ( $has_footer_1 ) { ?>

							<div class="footer-widgets column-one grid-item">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_footer_2 ) { ?>

							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_footer_3 ) { ?>

							<div class="footer-widgets column-three grid-item">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_footer_4 ) { ?>

							<div class="footer-widgets column-four grid-item">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</div>

						<?php } ?>

					</div><!-- .footer-widgets-wrapper -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>