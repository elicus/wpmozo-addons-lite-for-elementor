<?php
namespace WPMOZO\HelperTraits;

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Wpmozo_Ae_Helper_Functions {
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
}