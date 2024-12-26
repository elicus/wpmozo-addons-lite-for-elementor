<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use \Elementor\Plugin;

/**
 * Function to get category thumbnail image.
 *
 * @since    1.6.0
 * @return   array
 */

if ( ! function_exists( 'wpmozo_ae_woocommerce_category_thumbnail' ) ) {
    function wpmozo_ae_woocommerce_category_thumbnail( $category, $size = 'woocommerce_thumbnail' ) {
        $dimensions           = wc_get_image_size( $size );
        $thumbnail_id         = get_term_meta( $category->term_id, 'thumbnail_id', true );

        if ( $thumbnail_id ) {
            $image        = wp_get_attachment_image_src( $thumbnail_id, $size );
            $image        = is_array( $image ) ? $image[0] : wc_placeholder_img_src();
            $image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, $size ) : false;
            $image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, $size ) : false;
        } else {
            $image        = wc_placeholder_img_src();
            $image_srcset = false;
            $image_sizes  = false;
        }

        if ( $image ) {
            // Prevent esc_url from breaking spaces in urls for image embeds.
            // Ref: https://core.trac.wordpress.org/ticket/23605.
            $image = str_replace( ' ', '%20', $image );

            // Add responsive image markup if available.
            if ( $image_srcset && $image_sizes ) {
                return '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="' . esc_attr( $image_sizes ) . '" />';
            } else {
                return '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
            }
        }
    }
}

/**
 * Get reading time
 *
 * @since  1.0.0
 * @return string
 */
if ( ! function_exists( 'wpmozo_ae_reading_time' ) ) {
	function wpmozo_ae_reading_time() {
		global $post;
		$content     = get_post_field( 'post_content', $post->ID );
		$word_count  = str_word_count( wp_strip_all_tags( $content ) );
		$readingtime = ceil( $word_count / 260 );
		return $readingtime;
	}
}

/**
 * Post types Options
 *
 * @since  1.0.0
 * @return array
 */
if ( ! function_exists( 'wpmozo_ae_get_post_types' ) ) {
	function wpmozo_ae_get_post_types() {
		$post_types = get_post_types(
			array(
				'public' => true,
			),
			'objects'
		);
		$post_types = wp_list_pluck( $post_types, 'label', 'name' );

		return array_diff_key( $post_types, array( 'elementor_library', 'attachment' ) );
	}
}

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

/**
 * Check if given heading size is valid.
 *
 * @since    1.4.0
 */
if ( ! function_exists( 'wpmozo_ae_validate_select2' ) ) {
	function wpmozo_ae_validate_select2( $variable, $allowedValues = array() ) {
	    // Check if the variable is a string
	    if ( is_string( $variable ) ) {
	        return in_array( $variable, $allowedValues, true ) ? $variable : false; // Strict comparison
	    }

	    // Check if the variable is an array
	    if ( is_array( $variable ) ) {
	        // Ensure every value in the array is allowed
	        foreach ( $variable as $value ) {
	            if ( !in_array( $value, $allowedValues, true ) ) {
	                return false;
	            }
	        }
	        return $variable;
	    }

	    // If the variable is neither a string nor an array, it's invalid
	    return false;
	}
}
