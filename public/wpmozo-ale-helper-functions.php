<?php
defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
use \Elementor\Plugin;
/**
 * Post types Options
 *
 * @return array
 */
function wpmozo_ale_get_post_types() {
	$post_types = get_post_types(
		array(
			'public' => true,
		),
		'objects'
	);
	$post_types = wp_list_pluck( $post_types, 'label', 'name' );

	return array_diff_key( $post_types, array( 'elementor_library', 'attachment' ) );
}

function wpmozo_ale_reading_time() {
	global $post;
	$content     = get_post_field( 'post_content', $post->ID );
	$word_count  = str_word_count( wp_strip_all_tags( $content ) );
	$readingtime = ceil( $word_count / 260 );
	return $readingtime;
}


/** Function to get Elementor templates as options. **/
function wpmozo_ale_get_elementor_templates_as_options() {
	$templates        = Plugin::$instance->templates_manager->get_source( 'local' )->get_items();
	$template_options = array();
	// Add the "Select Template" option with an empty value as the first item.
	$template_options[0] = esc_html__( 'Select Template', 'wpmozo-addons-lite-for-elementor' );
	foreach ( $templates as $template ) {
		// Use the template's ID as the key and the title as the value.
		$template_options[ $template['template_id'] ] = $template['title'];
	}
	return $template_options;
}

/** Function to get a list of pages as options. **/
function wpmozo_ale_get_pages_as_options() {
	$pages        = get_pages();
	$page_options = array();
	global $post;

	$current_post_id = $post->ID;

	// Add the "Select Page" option with an empty value as the first item.
	$page_options[0] = esc_html__( 'Select Page', 'wpmozo-addons-lite-for-elementor' );

	foreach ( $pages as $page ) {
		if ( $current_post_id !== $page->ID ) {
			$page_options[ $page->ID ] = $page->post_title;
		}
	}
	return $page_options;
}
