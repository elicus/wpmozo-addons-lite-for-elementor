<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2026 Elicus Technologies Private Limited
 * @version   1.0.2
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;
if ( ! class_exists( 'WPMOZO_AE_Mystery_Image' ) ) {
	class WPMOZO_AE_Mystery_Image extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_mystery_image';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Mystery Image', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz mysteryimage', 'wpmozo mystery image', 'wpmz mystery image', 'wpmozo mysteryimage', 'wpmozo random image', 'wpmz random image', 'wpmozo shuffle image', 'wpmz shuffle image' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-mystery-image wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'wpmozo' );
		}

		/**
		 * Define Dependencies.
		 *
		 * Define the CSS files required to run the widget.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-mystery-image-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-mystery-image-style', 'wpmozo-ae-mfp-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-mystery-image-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-mystery-image-script', 'wpmozo-ae-mfp' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since  1.0.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'mystery-image/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since  1.0.0
		 * @access protected
		 */
		protected function render() {
			$settings            = $this->get_settings_for_display();
			$mystery_images      = isset( $settings['mystery_images'] ) ? $settings['mystery_images'] : array();
			$open_lightbox       = isset( $settings['open_lightbox'] ) ? $settings['open_lightbox'] : '';
			$lightbox_effect     = isset( $settings['lightbox_effect'] ) ? $settings['lightbox_effect'] : 'none';
			$transition_duration = ( isset( $settings['transition_duration']['size'] ) && '' !== $settings['transition_duration']['size'] ) ? intval( $settings['transition_duration']['size'] ) : 1000;
			$transition_duration = ( '' !== $transition_duration && 0 !== $transition_duration ) ? $transition_duration : 1000;
			$enable_overlay      = isset( $settings['enable_overlay'] ) ? $settings['enable_overlay'] : '';
			$overlay_icon_select = isset( $settings['overlay_icon_select'] ) ? $settings['overlay_icon_select'] : '';
			$image_link          = isset( $settings['image_link'] ) ? $settings['image_link'] : array();

			// Check if the gallery has any images.
			if ( ! empty( $mystery_images ) ) {
				// Flip the array to change keys with values.
				$flipped_images = array_flip(
					array_map(
						function ( $image ) {
							return isset( $image['url'] ) ? $image['url'] : ''; // Ensure 'url' exists in the image array.
						},
						$mystery_images
					)
				);

				// Select a random flipped key (which is an image URL).
				$random_key = array_rand( $flipped_images );

				// Find the original image data from the flipped array.
				$random_image = $mystery_images[ array_search(
					$random_key,
					array_map(
						function ( $image ) {
							return isset( $image['url'] ) ? $image['url'] : ''; // Ensure 'url' exists in the image array.
						},
						$mystery_images
					),
					true // Strict comparison.
				) ];

				// Get the image ID and alt text.
				$image_id  = $random_image['id']; // Image ID for wp_get_attachment_image.
				$image_alt = isset( $random_image['title'] ) ? $random_image['title'] : ''; // Image alt text.
				?>
				<div class="wpmozo_mystery_image wpmozo_mystery_image_0">
					<?php if ( 'yes' === $open_lightbox ) : ?>
						<a data-mfp-src="<?php echo esc_url( $random_image['url'] ); ?>" 
							class="wpmozo_mystery_image_lightbox" 
							data-lightbox_effect="<?php echo esc_attr( $lightbox_effect ); ?>" 
							data-lightbox_transition_duration="<?php echo esc_attr( $transition_duration ); ?>">
					<?php endif; ?>
					<?php if ( ! empty( $image_link['url'] ) ) : ?>
						<a href="<?php echo esc_url( $image_link['url'] ); ?>" class="wpmozo_mystery_image_link" target="<?php echo esc_attr( ! empty( $image_link['is_external'] ) ? '_blank' : '_self' ); ?>" rel="<?php echo esc_attr( ! empty( $image_link['nofollow'] ) ? 'nofollow' : '' ); ?>">
					<?php endif; ?>

						<span class="wpmozo_mystery_image_wrap 
						<?php
						if ( 'yes' === $enable_overlay ) :
							?>
							wpmozo_mystery_image_overlay<?php endif; ?>">
							<?php
							// Use wp_get_attachment_image to display the image.
							echo wp_get_attachment_image(
								$image_id, // Image ID.
								'full',    // Image size (you can change this to other sizes like 'medium', 'large', etc.).
								false,     // Don't need to pass a custom image source here.
								array(
									'fetchpriority' => 'high',
									'decoding'      => 'async',
									'alt'           => esc_attr( $image_alt ), // Alt text for the image.
									'class'         => 'wpmozo_mystery_img wp-image-' . $image_id, // Image class.
								)
							);
							?>
							<?php if ( 'yes' === $enable_overlay && ! empty( $overlay_icon_select ) ) { ?>
									<?php
										Icons_Manager::render_icon(
											$settings['overlay_icon_select'],
											array(
												'class' => array( 'wpmozo_overlay_icon' ),
												'aria-hidden' => 'true',
												'style'=> 'opacity:0;'
											)
										);
									?>
							<?php } ?>
						</span>
					<?php if ( 'yes' === $open_lightbox || ! empty( $image_link['url'] ) ) : ?>
					</a>
					<?php endif; ?>
				</div>
				<?php
			} else {
				// If no images are selected, output this message.
				?>
				<p>No images selected.</p> 
				<?php
			}
		}
	}
}