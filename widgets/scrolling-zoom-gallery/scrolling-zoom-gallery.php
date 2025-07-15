<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
if ( ! class_exists( 'WPMOZO_AE_Scrolling_Zoom_Gallery' ) ) {
	class WPMOZO_AE_Scrolling_Zoom_Gallery extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_scrolling_zoom_gallery';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Scrolling Zoom Gallery', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz scrolling zoom gallery', 'wpmozo scrolling zoom gallery' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-scrolling-zoom-gallery wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since  1.3.0
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
		 * @since  1.3.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-scrolling-zoom-gallery-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-scrolling-zoom-gallery-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-scrolling-zoom-gallery-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-scrolling-zoom-gallery-script', 'wpmozo-ae-imagesloaded', 'wpmozo-ae-gsap', 'wpmozo-ae-scrollTrigger' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since  1.3.0
		 * @access protected
		 */
		protected function register_controls() {

			// Separate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'scrolling-zoom-gallery/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since  1.3.0
		 * @access protected
		 */
		protected function render() {
			$settings       = $this->get_settings_for_display();
			$images_items   = is_array( $settings['images'] ) ? $settings['images'] : array();
			$no_images_text = isset( $settings['no_images_text'] ) ? $settings['no_images_text'] : 'No Images Found!';
			$image_size     = ! empty( $settings['image_size_size'] ) ? esc_attr( $settings['image_size_size'] ) : 'full';
			$start_opacity  = isset( $settings['start_opacity'] ) && ! empty( $settings['start_opacity']['size'] ) ? esc_attr( $settings['start_opacity']['size'] ) : 0;
			?>
			<div class="wpmozo_scrolling_zoom_gallery">
				<div class="wpmozo_scroll_zoom_gallery_scroller" data-start_opacity="<?php echo esc_attr( $start_opacity ); ?>">
					<div class="wpmozo_scroll_zoom_gallery_wrapper">
						<div class="wpmozo_scroll_zoom_gallery_inner">
							<?php if ( ! empty( $images_items ) ) : ?>
								<?php foreach ( $images_items as $items ) : ?>
									<?php if ( isset( $items['id'] ) && ! empty( $items['id'] ) ) : ?>
										<?php
											$image_id = $items['id'];
											$alt_text = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
										?>
										<div class="wpmozo_scroll_zoom_gallery_item">
											<?php
											echo wp_get_attachment_image(
												$image_id,
												$image_size,
												false,
												array(
													'loading' => 'eager',
													'class' => 'wpmozo_scroll_zoom_gallery_image',
													'alt' => esc_attr( $alt_text ),
												)
											);
											?>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php else : ?>
								<div class="wpmozo_scroll_zoom_gallery_no_item">
									<h3><?php echo esc_html( $no_images_text ); ?></h3>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
}