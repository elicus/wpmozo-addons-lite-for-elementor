<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wpmozo.com/
 * @since      1.6.1
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div id="wpmozo_ae_panel_general_section" class="wpmozo_ae_panel_section wpmozo_ae_panel_active_section">
	<?php
		require_once plugin_dir_path( __FILE__ ) . 'settings/general.php';
	?>
</div>
