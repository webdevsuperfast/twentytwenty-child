<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$has_footer_menu = has_nav_menu( 'footer' );

$footer_classes = '';

$footer_classes .= $has_footer_menu ? ' has-footer-menu' : '';
?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group<?php echo $footer_classes; ?>">

				<div class="section-inner">

					<div class="footer-credits">

						<p class="footer-copyright">&copy;
							<?php
							echo date_i18n(
								/* translators: Copyright date format, see https://www.php.net/date */
								_x( 'Y', 'copyright date format', 'twentytwenty' )
							);
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						</p><!-- .footer-copyright -->

						<p class="powered-by-wordpress">
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentytwenty' ) ); ?>">
								<?php _e( 'Powered by WordPress', 'twentytwenty' ); ?>
							</a>
						</p><!-- .powered-by-wordpress -->

					</div><!-- .footer-credits -->
					<?php if ( $has_footer_menu ) { ?>
						<div class="footer-navigation">
							<nav aria-label="<?php esc_attr_e( 'Footer', 'twentytwenty' ); ?>" role="navigation" class="footer-menu-wrapper">

								<ul class="footer-menu reset-list-style">
									<?php
									wp_nav_menu(
										array(
											'container'      => '',
											'depth'          => 1,
											'items_wrap'     => '%3$s',
											'theme_location' => 'footer',
										)
									);
									?>
								</ul>
							</nav><!-- .site-nav -->	
						</div><!-- .footer-navigation -->
					<?php } ?>
				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
