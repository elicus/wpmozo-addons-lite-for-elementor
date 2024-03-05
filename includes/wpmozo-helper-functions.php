<?php
defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
use \Elementor\Plugin;

/** Function to get Elementor templates as options. */
if ( ! function_exists( 'wpmozo_ae_get_elementor_templates_as_options' ) ) {
	function wpmozo_ae_get_elementor_templates_as_options() {
		$templates        = Plugin::$instance->templates_manager->get_source( 'local' )->get_items();
		$template_options = array();
		// Add the "Select Template" option with an empty value as the first item.
		$template_options[0] = esc_html__( 'Select Template', 'wpmozo-addons-for-elementor' );
		foreach ( $templates as $template ) {
			// Use the template's ID as the key and the title as the value.
			$template_options[ $template['template_id'] ] = $template['title'];
		}
		return $template_options;
	}
}

/** Function to get a list of pages as options. */
if ( ! function_exists( 'wpmozo_ae_get_pages_as_options' ) ) {
	function wpmozo_ae_get_pages_as_options() {
		$pages        = get_pages();
		$page_options = array();
		global $post;

		$current_post_id = $post->ID;

		// Add the "Select Page" option with an empty value as the first item.
		$page_options[0] = esc_html__( 'Select Page', 'wpmozo-addons-for-elementor' );

		foreach ( $pages as $page ) {
			if ( $current_post_id !== $page->ID ) {
				$page_options[ $page->ID ] = $page->post_title;
			}
		}
		return $page_options;
	}
}
