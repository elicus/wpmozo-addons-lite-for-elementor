<?php
/**
 * Plugin Name: WPMozo Addons Lite for Elementor
 * Plugin URI: https://wpmozo.com
 * Description: WPMozo Addons Lite for Elementor is a premium multipurpose plugin that comes with multiple
 * exceptional widgets. Using these unique and powerful widgets, you'll be able to create different web
 * page elements that would increase your site's functionality as well as appearance.
 * Version: 1.4.0
 * Author: Elicus
 * Author URI: https://elicus.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wpmozo-addons-lite-for-elementor
 * Domain Path: /languages
 * Requires at least: 5.3
 * Tested up to: 6.7.1
 * Elementor tested up to: 3.26.3
 * Elementor Pro tested up to: 3.26.2
 *
 * WPMozo Addons Lite for Elementor - A plugin for WordPress and Elementor.
 * Copyright © 2024 Elicus Technologies Private Limited
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/.>
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
add_action('admin_notices', 'wpmozo_lite_check_dependencies');
require_once(ABSPATH . 'wp-admin/includes/plugin.php');

if ( ! function_exists( 'wpmozo_addons_lite_for_elementor_activate' ) ) {
	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-wpmozo-addons-lite-for-elementor-activator.php
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function wpmozo_addons_lite_for_elementor_activate() {
		include_once plugin_dir_path( __FILE__ ) . 'includes/class-wpmozo-addons-lite-for-elementor-activator.php';
		WPMOZO_Addons_Lite_For_Elementor_Activator::activate();
	}
	register_activation_hook( __FILE__, 'wpmozo_addons_lite_for_elementor_activate' );
}

if ( ! function_exists( 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_elementor_version' ) ) {
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 */
	function wpmozo_addons_lite_for_elementor_admin_notice_minimum_elementor_version() {
		echo wp_kses_post(
			'
	        <div class="notice notice-warning is-dismissible">
	            <p>' . __( '<strong>WPMozo Addons Lite for Elementor</strong> requires <strong>Elementor</strong> version 2.0 or greater.', 'wpmozo-addons-lite-for-elementor' ) . '
	            </p>
	        </div>'
		);

		deactivate_plugins( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME );
	}
	// Check for required Elementor version.
	if ( file_exists(WP_PLUGIN_DIR . '/elementor/elementor.php') && is_plugin_active('elementor/elementor.php') && ! version_compare( ELEMENTOR_VERSION, '2.0', '>=' ) ) {
		add_action( 'admin_notices', 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_elementor_version' );
		return;
	}
}

if ( ! function_exists( 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_php_version' ) ) {
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 */
	function wpmozo_addons_lite_for_elementor_admin_notice_minimum_php_version() {

		echo wp_kses_post(
			'
	        <div class="notice notice-warning is-dismissible">
	            <p>' . __( '<strong>WPMozo Addons Lite for Elementor</strong> requires <strong>PHP</strong> version 5.6 or greater.', 'wpmozo-addons-lite-for-elementor' ) . '
	            </p>
	        </div>'
		);

		deactivate_plugins( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME );
	}
	// Check for required PHP version.
	if ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
		add_action( 'admin_notices', 'wpmozo_addons_lite_for_elementor_admin_notice_minimum_php_version' );
		return;
	}
}

// Check for required plugin and manage dependencies

/**
 * Check for plugin dependencies and show appropriate notices.
 * 
 * @since 1.3.0
 */
function wpmozo_lite_check_dependencies() {
    if (!current_user_can('activate_plugins')) {
        return; // Only show to users with permission to activate plugins
    }

    $current_screen = get_current_screen();
    if ($current_screen->base !== 'plugins') {
        return; // Only show notices on the Plugins page
    }

    $plugin_file = 'elementor/elementor.php';

    if (!file_exists(WP_PLUGIN_DIR . '/' . $plugin_file)) {
        $install_url = wp_nonce_url(
            self_admin_url('update.php?action=install-plugin&plugin=elementor'),
            'install-plugin_elementor'
        );

        echo '
            <div class="notice notice-error">
                <p>
                    <strong>WPMozo Addons Lite for Elementor</strong> requires the <strong>Elementor</strong> plugin to be installed.
                </p>
                <p>
                    <a href="' . esc_url($install_url) . '" class="button-primary">Install Now</a>
                </p>
            </div>';
    } elseif (!is_plugin_active($plugin_file)) {
        $activate_url = wp_nonce_url(
            self_admin_url('plugins.php?action=activate&plugin=' . $plugin_file),
            'activate-plugin_' . $plugin_file
        );

        echo '
            <div class="notice notice-warning">
                <p>
                    <strong>WPMozo Addons Lite for Elementor</strong> requires the <strong>Elementor</strong> plugin to be activated.
                </p>
                <p>
                    <a href="' . esc_url($activate_url) . '" class="button-primary">Activate Now</a>
                </p>
            </div>';
    }
}
$plugin_file = 'elementor/elementor.php';
if ( file_exists(WP_PLUGIN_DIR . '/' . $plugin_file) && is_plugin_active($plugin_file) ) {
    wpmozo_lite_handle_plugin_activation();
}
/**
 *Executes the main plugin files and classes after verifying all dependencies and conditions.
 * 
 * @since 1.3.0
 */
function wpmozo_lite_handle_plugin_activation() {
    define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_SLUG', 'wpmozo-addons-lite-for-elementor' );
    define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION', '1.4.0' );
    define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_URL', plugin_dir_url( __FILE__ ) );
    define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH', plugin_dir_path( __FILE__ ) );
    define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_BASENAME', plugin_basename( __FILE__ ) );
    define( 'WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_OPTION', 'wpmozo-addons-for-elementor-option' );

    // Load the plugin's main files once dependency is active
    require_once WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH . 'includes/class-wpmozo-addons-lite-for-elementor.php';
    $plugin = new WPMOZO_Addons_Lite_For_Elementor();
	$plugin->run();
}