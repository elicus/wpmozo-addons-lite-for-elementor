<?php
/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @author     Elicus <hello@elicus.com>
 */
class WPMOZO_Addons_Lite_For_Elementor_Deactivator {

	/**
     * Plugin Name.
     *
     * @since    1.0.0
     * @access   public
     * @var      string
     */
    public static $plugin_name = WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_SLUG;

    /**
     * Metadata Url.
     *
     * @since    1.0.0
     * @access   public
     * @var      string
     */
    public static $metadata_url = 'https://cdn.wpmozo.com';

	/**
     * Remove active installs from database.
     *
     * @access public
     * @return void
     */
	public static function deactivate() {
		global $wp_version;
        $params = array(
                    'timeout'    => ( ( defined('DOING_CRON') && DOING_CRON ) ? 30 : 5 ),
    				'user-agent' => 'WordPress/' . $wp_version . ';' . home_url( '/' ),
                    'body'       => array(
                            'action'    => sanitize_text_field( 'deactivate' ),
                            'slug'      => sanitize_text_field( self::$plugin_name ),
                            'url'       => rawurlencode( home_url( '/' ) ),
                        )
                    );
        $request = wp_safe_remote_post( self::$metadata_url, $params );
	}

}
