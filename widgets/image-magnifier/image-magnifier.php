<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2024 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use \Elementor\Group_Control_Image_Size;

if ( ! class_exists( 'WPMOZO_AE_Image_Magnifier' ) ) {
	class WPMOZO_AE_Image_Magnifier extends Widget_Base {

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
			return 'wpmozo_ae_image_magnifier';
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
			return esc_html__( 'Image Magnifier', 'wpmozo-addons-lite-for-elementor' );
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
			return 'eicon-zoom-in wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ale-image-magnifier-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ale-image-magnifier-style' );
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
			wp_register_script( 'wpmozo-ale-image-magnifier-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-ale-twenty-twenty', 'wpmozo-ale-magnify', 'wpmozo-ale-image-magnifier-script' );
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
			include_once plugin_dir_path( __DIR__ ) . 'image-magnifier/assets/controls/controls.php';
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
			$settings           = $this->get_settings_for_display();
			$widget_id          = $this->get_id();
			$image              = $settings['image'];
			$image_alt_text     = $settings['image_alt_text'];
			$attach_id          = absint( $image['id'] );
			$lense_speed        = $settings['lense_speed']['size'];
			$img_url            = Group_Control_Image_Size::get_attachment_image_src( $attach_id, 'image_size', $settings );
			$lense_border_width = $settings['lense_border_width'];
			$lense_border_color = $settings['lense_border_color'];

			?>
			<style>
				.elementor-widget-wpmozo_ae_image_magnifier .wpmozo_image_magnifier .magnify > .magnify-lens{
					box-shadow: 0 0 0 <?php echo esc_html( $lense_border_width['size'] ); ?>px <?php echo esc_html( $lense_border_color ); ?>;
				}
			</style>
			<div class="wpmozo_image_magnifier wpmozo_image_magnifier_<?php echo esc_attr( $widget_id ); ?>">
				<div class="magnify">            
					<img decoding="async"
					src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $image_alt_text ); ?>"
					data-magnify-src="<?php echo esc_url( $img_url ); ?>"
					data-magnify-speed="<?php echo esc_attr( $lense_speed ); ?>" 
					class="zoom"  />
				</div>
			</div>
			<?php
		}
	}
}
