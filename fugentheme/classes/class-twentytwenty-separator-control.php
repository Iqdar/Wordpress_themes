<?php
/**
 * Customizer Separator Control settings for this theme.
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	if ( ! class_exists( 'FugenTheme_Separator_Control' ) ) {
		/**
		 * Separator Control.
		 */
		class FugenTheme_Separator_Control extends WP_Customize_Control {
			/**
			 * Render the hr.
			 */
			public function render_content() {
				echo '<hr/>';
			}

		}
	}
}
