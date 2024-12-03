<?php

/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;

if ( !class_exists( 'WPMOZO_AE_Scroll_Image' ) ) {
	class WPMOZO_AE_Scroll_Image extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_scroll_image';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Scroll Image', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-scroll-image wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.1.0
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
		 * @since 1.1.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-scroll-image', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-scroll-image' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */

		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-scroll-image-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-ae-scroll-image-script' );
		}


		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.1.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'scroll-image/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.1.0
		 * @access protected
		 */
		protected function render() {
			$settings = $this->get_settings_for_display();
			if ( !empty( $settings[ 'scroll_image' ][ 'url' ] ) ) {
				$scroll_image = $settings[ 'scroll_image' ][ 'url' ];
			}
			$image_alt_tag       = $settings[ 'scroll_image_alt_text' ];
			$image_title         = $settings[ 'scroll_image_title' ];
			$scroll_direction    = $settings[ 'scroll_direction' ];
			$widget_link         = $settings[ 'scroll_image_link' ];
			$widget_link_target  = $settings[ 'scroll_image_link_target' ];
			$img_container_align = $settings[ 'scroll_image_alignment' ];
			
			?>

			<div class="wpmozo_ae_scroll_image">
				<div class="wpmozo_ae_scroll_image_wrapper <?php if ( !empty( $img_container_align ) ) { echo esc_attr( $img_container_align ); } ?>">
					<div class="wpmozo_ae_scroll_image_inner_wrapper" data-direction="<?php echo esc_attr( $scroll_direction ); ?>">
						<?php if ( !empty( $scroll_image ) ) { ?>
							<?php if ( !empty( $widget_link ) ) { ?>
								<a href="<?php echo esc_url( $widget_link ); ?>" target="<?php echo esc_attr( $widget_link_target ); ?>">
								<?php } ?>
								<img decoding="async" src="<?php echo esc_url( $scroll_image ); ?>" class="scroll_image"
									alt="<?php echo esc_attr( $image_alt_tag ); ?>" title="<?php echo esc_attr( $image_title ); ?>">
								<?php if ( !empty( $widget_link ) ) { ?>
								</a>
							<?php }
						} ?>
					</div>
				</div>
			</div>
			<?php
		}
	}
}