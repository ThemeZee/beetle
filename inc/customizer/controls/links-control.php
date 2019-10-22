<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Beetle
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Beetle_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'beetle' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/beetle/', 'beetle' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=beetle&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'beetle' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=beetle&utm_source=customizer&utm_campaign=beetle" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'beetle' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/beetle-documentation/', 'beetle' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=beetle&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'beetle' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=beetle/', 'beetle' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Changelog', 'beetle' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/beetle/reviews/', 'beetle' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'beetle' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
