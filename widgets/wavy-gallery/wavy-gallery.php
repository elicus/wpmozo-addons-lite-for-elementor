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
if ( ! class_exists( 'WPMOZO_AE_Wavy_Gallery' ) ) {
	class WPMOZO_AE_Wavy_Gallery extends Widget_Base {
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
			return 'wpmozo_ae_wavy_gallery';
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
			return esc_html__( 'Wavy Gallery', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz wavy gallery', 'wpmozo wavy gallery' );
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
			return 'wpmozo-ae-icon-wavy-gallery wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-wavy-gallery-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-wavy-gallery-style' );
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
			wp_register_script( 'wpmozo-ae-wavy-gallery-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-wavy-gallery-script', 'wpmozo-ae-gsap', 'wpmozo-ae-scrollTrigger', 'wpmozo-ae-scrollToPlugin' );
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
			require plugin_dir_path( __DIR__ ) . 'wavy-gallery/assets/controls/controls.php';
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
			$page_id        = get_the_ID(); // Elementor Page/Post ID.
			$widget_id      = $this->get_id(); // Widget instance ID (unique per widget).
			$images_items   = is_array( $settings['images'] ) ? $settings['images'] : array();
			$no_images_text = isset( $settings['no_images_text'] ) ? $settings['no_images_text'] : 'No Images Found!';
			$image_size     = ! empty( $settings['image_size_size'] ) ? esc_attr( $settings['image_size_size'] ) : 'full';
			?>
			<div class="wpmozo_wavy_gallery" data-page_id="<?php echo esc_attr( $page_id ); ?>">
				<div class="et_pb_module_inner">
					<div class="wpmozo_wavy_gallery_wrapper">
						<?php if ( ! empty( $images_items ) ) : ?>
							<div class="wpmozo_wavy_gallery_items">
								<?php foreach ( $images_items as $items ) : ?>
									<?php if ( isset( $items['id'] ) && ! empty( $items['id'] ) ) : 
										$image_id = $items['id'];
										$alt_text = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
										$img_title = get_the_title( $image_id );  
										?>
										<div class="wpmozo_wavy_gallery_item">
											<?php
												echo wp_get_attachment_image(
													$image_id,
													$image_size,
													false,
													array(
														'loading' => 'eager',
														'class' => 'wpmozo_wavy_gallery_image',
														'alt' => esc_attr( $alt_text ),
														'title'   => esc_attr( $img_title ),
													)
												);
											?>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						<?php else : ?>
							<div class="wpmozo_wavy_gallery_no_item">
								<h3><?php echo esc_html( $no_images_text ); ?></h3>
							</div>
						<?php endif; ?>
						<div class="elementor-element elementor-element-<?php echo esc_attr( $widget_id ); ?> wpmozo_wavy_gallery_overlay">
							<div class="wpmozo_wavy_gallery_overlay_items"></div>
							<div class="wpmozo_wavy_gallery_overlay_item_title"></div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
}