<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @author     Elicus <hello@elicus.com>
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class WPMOZO_Addons_Lite_For_Elementor_Activator {

	/**
     * Runs when plugin is activated
     *
     * @access public
     * @return void
     */
	public static function activate() {
        add_option( 'wpmozo_addons_lite_for_elementor_activated', 'yes' );
	}

}
