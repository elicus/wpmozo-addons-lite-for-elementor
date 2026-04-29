<?php
namespace WPMOZO\HelperTraits;

use Elementor\Plugin;

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Wpmozo_Ae_Helper_Functions {
	/**
	 * Get reading time
	 *
	 * @since  1.0.0
	 * @return string
	 */
	public static function wpmozo_ae_reading_time() {
		global $post;
		$content     = get_post_field( 'post_content', $post->ID );
		$word_count  = str_word_count( wp_strip_all_tags( $content ) );
		$readingtime = ceil( $word_count / 260 );
		return $readingtime;
	}
    /**
	 * Function to get a list of pages as options.
	 *
	 * @since    1.0.0
	 */
	public static function wpmozo_ae_get_pages_as_options() {
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
	/**
	 * Get blog category list.
	 *
	 * @since 1.9.0
	 */
	public static function wpmozo_get_blog_posts_categories() {
		$terms           = get_terms(
			array(
				'taxonomy'   => 'category',
				'hide_empty' => false,
			)
		);
		$dynamic_options = array();
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$dynamic_options[ $term->term_id ] = $term->name;
			}
		}
		return $dynamic_options;
	}
	/**
	 * Get team members by category.
	 *
	 * @since 1.0.0
	 */
	public static function wpmozo_get_post_categories() {
		$terms = get_terms( array( 'taxonomy'   => 'category', 'hide_empty' => false, ) );
		$dynamic_options = array();
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$dynamic_options[ $term->term_id ] = $term->name;
			}
		}
		return $dynamic_options;
	}
	/**
	 * Post types Options
	 *
	 * @since  1.0.0
	 * @return array
	 */
	public static function wpmozo_ae_get_post_types() {
		$post_types = get_post_types(
			array(
				'public' => true,
			),
			'objects'
		);
		$post_types = wp_list_pluck( $post_types, 'label', 'name' );

		return array_diff_key( $post_types, array( 'elementor_library', 'attachment' ) );
	}

	/**
	 * Function to get a Elementor templates as options.
	 *
	 * @since    1.0.0
	 */
	public static function wpmozo_ae_get_elementor_templates_as_options() {
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

	/**
	 * Function to validate a givin layout.
	 *
	 * @since    1.1.1
	 */
	public static function wpmozo_ae_validate_layout( $layout, $layouts = array() ) {
		if ( in_array( $layout, $layouts, true ) ) {
			return sanitize_file_name( $layout );
		}
		return sanitize_file_name( $layouts[0] );
	}

	/**
	 * Function to get testimonial categories.
	 *
	 * @since    1.3.0
	 */
	public static function wpmozo_ae_get_testimonial_categories() {
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

	/**
	 * Check if given heading size is valid.
	 *
	 * @since    1.1.1
	 */
	public static function wpmozo_ae_validate_heading_level($tag) {
		$valid_tags = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
	    if ( in_array( $tag, $valid_tags, true ) ) {
			return esc_html( $tag );
		}
		return esc_html( 'h5' );
	}

	/**
	 * Check if given heading size is valid.
	 *
	 * @since    1.4.0
	 */
	public static function wpmozo_ae_validate_select2( $variable, $allowedValues = array() ) {
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
	/**
	 * Get CSS aspect ratio from an image URL.
	 *
	 * @since    1.4.0
	 * @param string $image_url Image URL.
	 * @return string|false Aspect ratio string (e.g., "16 / 9") or false on failure.
	 */
	public static function wpmozo_get_image_aspect_ratio( $image_id ) {
		$image = wp_get_attachment_image_src( $image_id, 'full' );
		if ( ! $image ) {
			return false;
		}

		$width  = (int) $image[1];
		$height = (int) $image[2];

		if ( $width === 0 || $height === 0 ) {
			return false;
		}

		// Get GCD (Greatest Common Divisor).
		$gcd = function( $a, $b ) use ( &$gcd ) {
			return $b === 0 ? $a : $gcd( $b, $a % $b );
		};

		$divisor = $gcd( $width, $height );

		$w = $width / $divisor;
		$h = $height / $divisor;

		// Example: "1920 / 1279"
		return sprintf( '%d / %d', $w, $h );
	}
	/**
	 * Retrieve SVG file contents from URL.
	 *
	 * @param string $svg_file SVG file URL.
	 * @return string
	 */
	
		public static function wpmozo_get_svg_content( $svg_file ) {
		if ( empty( $svg_file ) ) {
			return '';
		}
		if ( strpos( $svg_file, '.svg' ) === false ) {
			return '';
		}
		$response = wp_remote_get(
			$svg_file,
			array(
				'timeout'     => 10,
				'redirection' => 5,
				'sslverify'   => true,
			)
		);

		// Request fail?
		if ( is_wp_error( $response ) ) {
			return false;
		}

		// HTTP status check.
		$status_code = wp_remote_retrieve_response_code( $response );
		if ( 200 !== $status_code ) {
			return false;
		}

		// Body retrieve.
		$content = wp_remote_retrieve_body( $response );

		if ( empty( $content ) ) {
			return false;
		}

		return $content;
	}
}