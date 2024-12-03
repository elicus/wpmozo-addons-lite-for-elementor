<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use \Elementor\Plugin;

/**
 * Function to get a Elementor templates as options.
 *
 * @since    1.0.0
 */
if ( ! function_exists( 'wpmozo_ae_get_elementor_templates_as_options' ) ) {
	function wpmozo_ae_get_elementor_templates_as_options() {
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
}

/**
 * Function to get a list of pages as options.
 *
 * @since    1.0.0
 */
if ( ! function_exists( 'wpmozo_ae_get_pages_as_options' ) ) {
	function wpmozo_ae_get_pages_as_options() {
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
}

/**
 * Function to validate a givin layout.
 *
 * @since    1.1.1
 */
if ( ! function_exists( 'wpmozo_ae_validate_layout' ) ) {
	function wpmozo_ae_validate_layout( $layout, $layouts = array() ) {
		if ( in_array( $layout, $layouts, true ) ) {
			return sanitize_file_name( $layout );
		}
		return sanitize_file_name( $layouts[0] );
	}
}

/**
 * Function to get testimonial categories.
 *
 * @since    1.3.0
 */
if ( ! function_exists( 'wpmozo_ae_get_testimonial_categories' ) ) {
	function wpmozo_ae_get_testimonial_categories() {
	    $terms = get_terms( array( 
	        'taxonomy' =>'wpmozo-ae-testimonial-category',
	        'hide_empty' => false,
	    ) );
	    $dynamic_options = array();
	    if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
	        foreach ( $terms as $term ) {
	            $dynamic_options[ $term->term_id ] = $term->name;
	        }
	    }
	    return $dynamic_options;
	}
}

/**
 * Check if given heading size is valid.
 *
 * @since    1.1.1
 */
if ( ! function_exists( 'wpmozo_ae_validate_heading_level' ) ) {
	function wpmozo_ae_validate_heading_level($tag) {
		$valid_tags = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
	    if ( in_array( $tag, $valid_tags, true ) ) {
			return esc_html( $tag );
		}
		return esc_html( 'h5' );
	}
}
