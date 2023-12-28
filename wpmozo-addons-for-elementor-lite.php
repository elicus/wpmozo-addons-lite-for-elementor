<?php
/**
 * Plugin Name: WPMozo Addons for Elementor Lite
 * Plugin URI: https://wpmozo.com
 * Description: WPMozo Addons for Elementor Lite is a premium multipurpose plugin that comes with multiple 
 * exceptional widgets. Using these unique and powerful widgets, you'll be able to create different web 
 * page elements that would increase your site's functionality as well as appearance.
 * Version: 1.0.0
 * Author: Elicus
 * Author URI: https://elicus.com/
 * Update URI: https://wpmozo.com/
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wpmozo-addons-for-elementor-lite
 * Domain Path: /languages
 * Requires at least: 5.3
 * Tested up to: 6.3.2
 * Elementor tested up to: 3.16.6
 * Elementor Pro tested up : 3.16.6
 * 
 * WPMozo Addons for Elementor Lite - A plugin for WordPress and Elementor.
 * Copyright © 2023 Elicus Technologies Private Limited
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
 * 
*/

// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_SLUG', 'wpmozo-addons-for-elementor-lite' );
define( 'WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_VERSION', '1.0.0' );
define( 'WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_BASENAME', plugin_basename( __FILE__ ) );
define( 'WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_OPTION', 'wpmozo-addons-for-elementor-lite' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpmozo-addons-for-elementor-activator.php
 * 
 * @return void
 * @since  1.0.0
 */
function activate_wpmozo_addons_for_elementor() {
    include_once plugin_dir_path(__FILE__) . 'includes/class-wpmozo-addons-for-elementor-activator.php';
    WPMozo_Addons_For_Elementor_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpmozo-addons-for-elementor-deactivator.php
 * 
 * @return void
 * @since  1.0.0
 */
function deactivate_wpmozo_addons_for_elementor() {
    include_once plugin_dir_path(__FILE__) . 'includes/class-wpmozo-addons-for-elementor-deactivator.php';
    WPMozo_Addons_For_Elementor_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_wpmozo_addons_for_elementor');
register_deactivation_hook(__FILE__, 'deactivate_wpmozo_addons_for_elementor');

/**
 * Admin notice
 *
 * Warning when the site doesn't have Elementor installed or activated.
 *
 * @since 1.0.0
 */
function wpmozo_addons_for_elementor_admin_notice_missing_elementor() {
    $message = sprintf(
        esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'wpmozo-addons-for-elementor-lite' ),
        '<strong>' . esc_html__( 'WPMozo Addons for Elementor', 'wpmozo-addons-for-elementor-lite' ) . '</strong>',
        '<strong>' . esc_html__( 'Elementor', 'wpmozo-addons-for-elementor-lite' ) . '</strong>'
    );

    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    deactivate_plugins(WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_BASENAME);
}

/**
 * Admin notice
 *
 * Warning when the site doesn't have a minimum required Elementor version.
 *
 * @since 1.0.0
 */
function wpmozo_addons_for_elementor_admin_notice_minimum_elementor_version() {
    $message = sprintf(
        esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wpmozo-addons-for-elementor-lite' ),
        '<strong>' . esc_html__( 'WPMozo Addons for Elementor Lite', 'wpmozo-addons-for-elementor-lite' ) . '</strong>',
        '<strong>' . esc_html__( 'Elementor', 'wpmozo-addons-for-elementor-lite' ) . '</strong>',
        '2.0'
    );

    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    deactivate_plugins(WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_BASENAME);
}

/**
 * Admin notice
 *
 * Warning when the site doesn't have a minimum required PHP version.
 *
 * @since 1.0.0
 */
function wpmozo_addons_for_elementor_admin_notice_minimum_php_version() {
    $message = sprintf(
        esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wpmozo-addons-for-elementor-lite' ),
        '<strong>' . esc_html__( 'WPMozo Addons for Elementor Lite', 'wpmozo-addons-for-elementor-lite' ) . '</strong>',
        '<strong>' . esc_html__( 'PHP', 'wpmozo-addons-for-elementor-lite' ) . '</strong>',
        '5.6'
    );

    printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    deactivate_plugins(WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_BASENAME);
}

// Check for Elementor plugin
if ( ! did_action( 'elementor/loaded' ) ) {
    add_action( 'admin_notices', 'wpmozo_addons_for_elementor_admin_notice_missing_elementor' );
    return;
}

// Check for required Elementor version
if ( ! version_compare( ELEMENTOR_VERSION, '2.0', '>=' ) ) {
    add_action( 'admin_notices', 'wpmozo_addons_for_elementor_admin_notice_minimum_elementor_version' );
    return;
}

// Check for required PHP version
if ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
    add_action( 'admin_notices', 'wpmozo_addons_for_elementor_admin_notice_minimum_php_version' );
    return;
}

require_once WPMOZO_ADDONS_FOR_ELEMENTOR_LITE_DIR_PATH . 'includes/class-wpmozo-addons-for-elementor.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function wpmozo_addons_for_elementor_lite() {

	$plugin = new WPMOZO_Addons_For_Elementor_Lite();
	$plugin->run();

}
wpmozo_addons_for_elementor_lite();
